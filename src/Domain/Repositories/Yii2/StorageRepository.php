<?php

namespace ZnBundle\Language\Domain\Repositories\Yii2;

use Yii;
use yii\web\Cookie;
use ZnBundle\Language\Domain\Interfaces\Repositories\StorageRepositoryInterface;

class StorageRepository implements StorageRepositoryInterface
{

    const COOKIE_KEY = 'language';

    public function setLanguage(string $locale)
    {
        $cookie = new Cookie();
        $cookie->name = self::COOKIE_KEY;
        $cookie->value = $locale;
        Yii::$app->response->cookies->add($cookie);
    }

    public function getLanguage(): string
    {
        $cookie = Yii::$app->request->cookies->get(self::COOKIE_KEY);
        if ($cookie) {
            return $cookie->value;
        } else {
            return Yii::$app->language;
        }
    }
}
