<?php

namespace App\Widgets;

use Sanjab\Widgets\Widget;

class TinyMCEWidget extends Widget
{
    public function init()
    {
        $this->tag('tiny-mce');
    }
}
