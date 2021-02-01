<?php

return [
    'ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface' => 'ZnBundle\Language\Domain\Services\LanguageService',
    'ZnBundle\Language\Domain\Interfaces\Services\RuntimeLanguageServiceInterface' => 'ZnBundle\Language\Domain\Services\RuntimeLanguageService',

    'ZnBundle\Language\Domain\Interfaces\Repositories\LanguageRepositoryInterface' => 'ZnBundle\Language\Domain\Repositories\Eloquent\LanguageRepository',
    'ZnBundle\Language\Domain\Interfaces\Repositories\SwitchRepositoryInterface' => 'ZnBundle\Language\Domain\Repositories\Yii2\SwitchRepository',
    'ZnBundle\Language\Domain\Interfaces\Repositories\StorageRepositoryInterface' => 'ZnBundle\Language\Domain\Repositories\Yii2\StorageRepository',
];