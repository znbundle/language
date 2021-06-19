<?php

namespace ZnBundle\Language\Domain\Interfaces\Services;

use Illuminate\Support\Collection;
use ZnBundle\Language\Domain\Entities\LanguageEntity;
use ZnCore\Domain\Interfaces\Service\CrudServiceInterface;

interface LanguageServiceInterface extends CrudServiceInterface
{

    /**
     * @return Collection | LanguageEntity[]
     */
    public function allEnabled(): Collection;
}
