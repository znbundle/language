<?php

namespace ZnBundle\Language\Domain\Repositories\Yii2;

use Yii;
use yii\web\Cookie;
use ZnBundle\Language\Domain\Interfaces\Repositories\SwitchRepositoryInterface;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;

class SwitchRepository implements SwitchRepositoryInterface
{

    public function setLanguage(string $locale)
    {
        Yii::$app->language = $locale;
        I18Next::getService()->setLanguage($locale);
    }

    public function getLanguage(): string
    {
        return Yii::$app->language;
    }
}
