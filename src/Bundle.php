<?php

namespace ZnBundle\Language;

use ZnCore\Base\Libs\App\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function i18next(): array
    {
        return [
            'language' => 'vendor/znbundle/language/src/Domain/i18next/__lng__/__ns__.json',
        ];
    }

    public function yiiWeb(): array
    {
        return [
            'modules' => [
                'language' => __NAMESPACE__ . '\Yii2\Web\Module',
            ],
        ];
    }

    public function yiiAdmin(): array
    {
        return $this->yiiWeb();
    }

    public function migration(): array
    {
        return [
            '/vendor/znbundle/language/src/Domain/Migrations',
        ];
    }

    public function container(): array
    {
        return [
            [__DIR__ . '/Domain/config/container.php', 'singletons'],
        ];
    }
}
