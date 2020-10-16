<?php

namespace App\Http\Controllers\Admin\Crud;

use App\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Sanjab\Cards\StatsCard;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\CheckboxWidget;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\NumberWidget;
use Sanjab\Widgets\TextWidget;
use Sanjab\Widgets\DateTimeWidget;
use Sanjab\Widgets\Relation\BelongsToPickerWidget;
use Sanjab\Widgets\Wysiwyg\QuillWidget;

class ExamController extends CrudController
{
    protected static function properties(): CrudProperties
    {
        return CrudProperties::create('exams')
            ->model(\App\Exam::class)
            ->title('Exam')
            ->titles('Exams')
            ->globalSearch(true)
            ->itemFormat('%topic')
            ->icon(MaterialIcons::LIST);
    }

    protected function init(string $type, Model $item = null): void
    {
        $this->widgets[] = IdWidget::create();
        $this->widgets[] = TextWidget::create('topic')
            ->searchable(true)
            ->cols(6)
            ->rules('required|string');
        $this->widgets[] = TextWidget::create('subject')
            ->cols(6)
            ->rules('required|string');
        $this->widgets[] = NumberWidget::create('time')
            ->cols(6)
            ->description('Time in Minutes.')
            ->rules('required|numeric');
        $this->widgets[] = NumberWidget::create('marks')
            ->cols(6)
            ->description('Total marks for this exam.')
            ->rules('required|numeric');
        $this->widgets[] = QuillWidget::create('instructions')
            ->required();
        $this->widgets[] = DateTimeWidget::create('start_at', 'Start Date')
            ->description("leave empty if needs to be available as soon it's created till end date.")
            ->dateOnly()
            ->customStore(function (Request $request, Model $exam) {
                $exam->start_at = $request->start_at ?: null;
            })
            ->rules('nullable|date')
            ->createRules('after_or_equal:today');
        $this->widgets[] = DateTimeWidget::create('end_at', 'End Date')
            ->description("leave empty if needs to be available all the time after start date.")
            ->dateOnly()
            ->customStore(function (Request $request, Model $exam) {
                $exam->end_at = $request->end_at ?: null;
            })
            ->rules('nullable|date')
            ->createRules('after_or_equal:today');

        $this->widgets[] = BelongsToPickerWidget::create('test_series')
            ->nullable()
            ->withNull('None')
            ->format('%title (₹ %price)');


        $this->cards[] = StatsCard::create('Ongoing Exams')
            ->icon(MaterialIcons::TIMER)
            ->variant('warning')
            ->value(function () {
                return (new Exam)->getValidExams()->count();
            });
        $this->cards[] = StatsCard::create('Expired Exams')
            ->icon(MaterialIcons::TIMER_OFF)
            ->variant('danger')
            ->value(function () {
                return Exam::where('end_at', '<', Carbon::today())->count();
            });
        $this->cards[] = StatsCard::create('Not Started')
            ->icon(MaterialIcons::AV_TIMER)
            ->variant('info')
            ->value(function () {
                return Exam::where('start_at', '>', Carbon::today())->count();
            });
    }
}
