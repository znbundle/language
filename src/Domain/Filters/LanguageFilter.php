<?php

namespace ZnBundle\Language\Domain\Filters;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use ZnCore\Base\Libs\Entity\Interfaces\ValidateEntityByMetadataInterface;

class LanguageFilter
{

    private $isEnabled = true;

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): void
    {
        $this->isEnabled = $isEnabled;
    }
}
