<?php

namespace ZnBundle\Language\Domain\Repositories\Console;

use ZnBundle\Language\Domain\Interfaces\Repositories\SwitchRepositoryInterface;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;

class SwitchRepository implements SwitchRepositoryInterface
{

    public function setLanguage(string $locale)
    {

    }

    public function getLanguage(): string
    {
        return 'ru';
    }
}
