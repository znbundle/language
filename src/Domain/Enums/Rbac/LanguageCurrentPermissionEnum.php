<?php

namespace ZnBundle\Language\Domain\Enums\Rbac;

use ZnCore\Base\Enum\Interfaces\GetLabelsInterface;

class LanguageCurrentPermissionEnum implements GetLabelsInterface
{

    const SWITCH = 'oLanguageCurrentSwitch';

    public static function getLabels()
    {
        return [
            self::SWITCH => 'Текущий язык. Переключить',
        ];
    }
}