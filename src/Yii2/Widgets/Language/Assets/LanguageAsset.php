<?php

namespace ZnBundle\Language\Yii2\Widgets\Language\Assets;

use ZnYii\Base\Web\Assets\BaseAsset;

class LanguageAsset extends BaseAsset
{

    public $sourcePath = __DIR__ . '/dist';
    public $css = [
        'css/flag-icon.min.css',
    ];
}
