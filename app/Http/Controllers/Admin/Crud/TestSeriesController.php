<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\DateTimeWidget;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\MoneyWidget;
use Sanjab\Widgets\NumberWidget;
use Sanjab\Widgets\TextWidget;
use Sanjab\Widgets\Wysiwyg\QuillWidget;

class TestSeriesController extends CrudController
{
    protected static function properties(): CrudProperties
    {
        return CrudProperties::create('testseries')
            ->model(\App\TestSeries::class)
            ->title('Test Series')
            ->titles('Test Series')
            ->icon(MaterialIcons::APPS);
    }

    protected function init(string $type, Model $item = null): void
    {
        $this->widgets[] = IdWidget::create();
        $this->widgets[] = TextWidget::create('title')->required();
        $this->widgets[] = QuillWidget::create('description')->required();
        $this->widgets[] = NumberWidget::create('discount')->required();
        $this->widgets[] = DateTimeWidget::create('start_date', 'Start Date')
            ->description("Leave empty if needs to be available as soon it's saved.")
            ->dateOnly()
            ->customStore(function (Request $request, Model $series) {
                $series->start_date = $request->start_date ?: null;
            })
            ->rules('nullable|date|after_or_equal:today');
        $this->widgets[] = MoneyWidget::create('price')
            ->prefix('₹ ')
            ->value(0)
            ->postfix('')
            ->precision(0)
            ->rules('numeric|min:0');
    }
}
