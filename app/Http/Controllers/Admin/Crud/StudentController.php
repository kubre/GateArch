<?php

namespace App\Http\Controllers\Admin\Crud;

use App\Student;
use Illuminate\Database\Eloquent\Model;
use Sanjab\Cards\StatsCard;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\NumberWidget;
use Sanjab\Widgets\PasswordWidget;
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

        $this->cards[] = StatsCard::create('Verified Students')
            ->icon(MaterialIcons::CHECK_CIRCLE)
            ->variant('success')
            ->value(Student::whereNotNull('mobile_verified_at')->count());
    }
}
