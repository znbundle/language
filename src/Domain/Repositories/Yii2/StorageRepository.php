<?php

namespace ZnBundle\Language\Domain\Repositories\Yii2;

use Yii;
use yii\web\Cookie;
use ZnBundle\Language\Domain\Interfaces\Repositories\StorageRepositoryInterface;
use ZnBundle\Language\Domain\Interfaces\Repositories\SwitchRepositoryInterface;

class StorageRepository implements StorageRepositoryInterface
{

    public function setLanguage(string $locale)
    {
        $cookie = new Cookie();
        $cookie->name = 'language';
        $cookie->value = $locale;
        Yii::$app->response->cookies->add($cookie);
    }

    public function getLanguage(): string
    {
        $cookie = Yii::$app->request->cookies->get('language');
        if ($cookie) {
            return $cookie->value;
        } else {
            return Yii::$app->language;
        }
    }
}
