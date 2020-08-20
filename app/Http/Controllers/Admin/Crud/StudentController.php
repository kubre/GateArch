<?php

namespace App\Http\Controllers\Admin\Crud;

use App\Student;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Sanjab\Cards\StatsCard;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\DateTimeWidget;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\NumberWidget;
use Sanjab\Widgets\PasswordWidget;
use Sanjab\Widgets\Relation\BelongsToManyWidget;
use Sanjab\Widgets\SelectWidget;
use Sanjab\Widgets\TextWidget;

class StudentController extends CrudController
{
    protected static function properties(): CrudProperties
    {
        return CrudProperties::create('students')
            ->model(\App\Student::class)
            ->title('Student')
            ->titles('Students')
            ->globalSearch(true)
            ->icon(MaterialIcons::PEOPLE);
    }

    protected function init(string $type, Model $item = null): void
    {
        $this->widgets[] = IdWidget::create();
        $this->widgets[] = TextWidget::create('name')
            ->required();
        $this->widgets[] = TextWidget::create('email')
            ->required()
            ->rules('email|max:50');
        $this->widgets[] = NumberWidget::create('mobile')
            ->required()
            ->rules('digits:10');
        $this->widgets[] = PasswordWidget::create('password')
            ->createRules('required|min:6')
            ->editRules('nullable');
        $this->widgets[] = DateTimeWidget::create('dob')
            ->nullable()
            ->dateOnly()
            ->maxDateTime(Carbon::today());
        $this->widgets[] = TextWidget::create('college_name');
        $this->widgets[] = SelectWidget::create('graduation_status')
            ->addOption('appearing', 'Appearing')
            ->addOption('passed', 'Passed');
        $this->widgets[] = NumberWidget::create('graduation_year');
        $this->widgets[] = BelongsToManyWidget::create('test_series')->format('%title - %price');

        $this->cards[] = StatsCard::create('Verified Students')
            ->icon(MaterialIcons::CHECK_CIRCLE)
            ->variant('success')
            ->value(Student::whereNotNull('mobile_verified_at')->count());
    }
}
