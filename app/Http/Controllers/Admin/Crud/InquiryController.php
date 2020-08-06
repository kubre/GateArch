<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Database\Eloquent\Model;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\DateTimeWidget;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\ShowWidget;
use Sanjab\Widgets\TextWidget;

class InquiryController extends CrudController
{
    protected static function properties(): CrudProperties
    {
        return CrudProperties::create('inquiries')
            ->model(\App\Inquiry::class)
            ->title('Inquiry')
            ->titles('Inquiries')
            ->creatable(false)
            ->editable(false)
            ->globalSearch(true)
            ->icon(MaterialIcons::MAIL);
    }

    protected function init(string $type, Model $item = null): void
    {
        $this->widgets[] = IdWidget::create();
        $this->widgets[] = ShowWidget::create('name')->searchable(true);
        $this->widgets[] = ShowWidget::create('email')->searchable(true);
        $this->widgets[] = ShowWidget::create('subject')->searchable(true);
        $this->widgets[] = ShowWidget::create('message')->searchable(true);
        $this->widgets[] = DateTimeWidget::create('created_at', 'Date')
            ->searchable(true);
    }
}
