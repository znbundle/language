<?php

namespace ZnBundle\Language\Domain\Interfaces\Services;

use ZnCore\Domain\Collection\Libs\Collection;
use ZnBundle\Language\Domain\Entities\LanguageEntity;
use ZnCore\Domain\Service\Interfaces\CrudServiceInterface;

interface LanguageServiceInterface extends CrudServiceInterface
{

    /**
     * @return Collection | LanguageEntity[]
     */
    public function allEnabled(): Collection;
}
