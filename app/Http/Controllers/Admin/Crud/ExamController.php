<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Database\Eloquent\Model;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\NumberWidget;
use Sanjab\Widgets\TextWidget;
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
    }
}
