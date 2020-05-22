<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Database\Eloquent\Model;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\File\ElFinderWidget;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\ItemListWidget;
use Sanjab\Widgets\NumberWidget;
use Sanjab\Widgets\Relation\BelongsToPickerWidget;
use Sanjab\Widgets\SelectWidget;
use Sanjab\Widgets\TextWidget;

class SectionController extends CrudController
{
    protected static function properties(): CrudProperties
    {
        return CrudProperties::create('sections')
            ->model(\App\Section::class)
            ->title('Section')
            ->titles('Sections')
            ->icon(MaterialIcons::TAB);
    }

    protected function init(string $type, Model $item = null): void
    {
        $this->widgets[] = IdWidget::create();
        $this->widgets[] = NumberWidget::create('number')->required();
        $this->widgets[] = TextWidget::create('title')->required();
        $this->widgets[] = ItemListWidget::create('questions')
            ->addWidgets([
                NumberWidget::create('number', 'Question Number')
                    ->cols(2),
                ElFinderWidget::image('image')
                    ->cols(6),
                SelectWidget::create('type')
                    ->addOption('mcq', 'MCQ')
                    ->addOption('nat', 'NAT')
                    ->cols(4)
                    ->value('mcq'),
                TextWidget::create('answer')
                    ->cols(4),
                NumberWidget::create('marks')
                    ->value(1)
                    ->cols(4),
                SelectWidget::create('negative')
                    ->addOption('1/3', '1/3')
                    ->addOption('2/3', '2/3')
                    ->addOption('0', '0')
                    ->cols(4)
            ]);
        $this->widgets[] = BelongsToPickerWidget::create('exam')
            ->format('%topic')
            ->required();
    }
}
