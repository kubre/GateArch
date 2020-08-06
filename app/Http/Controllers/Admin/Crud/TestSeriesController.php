<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\MoneyWidget;
use Sanjab\Widgets\TextWidget;

class TestSeriesController extends CrudController
{
    protected static function properties(): CrudProperties
    {
        return CrudProperties::create('testseries')
            ->model(\App\TestSeries::class)
            ->title('Test Series')
            ->titles('Test Serieses')
            ->icon(MaterialIcons::APPS);
    }

    protected function init(string $type, Model $item = null): void
    {
        $this->widgets[] = IdWidget::create();
        $this->widgets[] = TextWidget::create('title')->required();
        $this->widgets[] = MoneyWidget::create('price')
            ->prefix('₹ ')
            ->postfix('')
            ->precision(0)
            ->rules('numeric|min:0');
    }
}
