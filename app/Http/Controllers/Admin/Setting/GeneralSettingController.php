<?php

namespace App\Http\Controllers\Admin\Setting;

use Sanjab\Controllers\SettingController;
use Sanjab\Helpers\SettingProperties;
use Sanjab\Widgets\TextWidget;

class GeneralSettingController extends SettingController
{
    protected static function properties(): SettingProperties
    {
        return SettingProperties::create('general')
            ->title('Site Settings');
    }

    protected function init(): void
    {
        $this->widgets[] = TextWidget::create('keywords', 'Keyword Meta Tag')->description('meta tag keywords on all pages . Use , to seperate multiple keywords');
    }
}
