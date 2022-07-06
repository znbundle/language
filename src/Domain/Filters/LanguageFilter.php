<?php

namespace ZnBundle\Language\Domain\Filters;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use ZnCore\Validation\Interfaces\ValidationByMetadataInterface;

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
