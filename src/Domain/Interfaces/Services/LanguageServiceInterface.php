<?php

namespace ZnBundle\Language\Domain\Interfaces\Services;

use ZnBundle\Language\Domain\Entities\LanguageEntity;
use ZnCore\Domain\Collection\Interfaces\Enumerable;
use ZnCore\Domain\Service\Interfaces\CrudServiceInterface;

interface LanguageServiceInterface extends CrudServiceInterface
{

    /**
     * @return Enumerable | LanguageEntity[]
     */
    public function allEnabled(): Enumerable;
}
