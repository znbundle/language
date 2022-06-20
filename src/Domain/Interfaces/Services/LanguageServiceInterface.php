<?php

namespace ZnBundle\Language\Domain\Interfaces\Services;

use Illuminate\Support\Collection;
use ZnBundle\Language\Domain\Entities\LanguageEntity;
use ZnCore\Base\Libs\Service\Interfaces\CrudServiceInterface;

interface LanguageServiceInterface extends CrudServiceInterface
{

    /**
     * @return Collection | LanguageEntity[]
     */
    public function allEnabled(): Collection;
}
