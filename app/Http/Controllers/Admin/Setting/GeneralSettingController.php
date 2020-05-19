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
            ->title('General Settings');
    }

    protected function init(): void
    {
        $this->widgets[] = TextWidget::create('example');
    }
}
