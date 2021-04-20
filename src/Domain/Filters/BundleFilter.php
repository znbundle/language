<?php

namespace ZnBundle\Language\Domain\Filters;

use ZnSandbox\Sandbox\Status\Domain\Filters\BaseStatusFilter;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class BundleFilter extends BaseStatusFilter
{

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        self::loadStatusValidatorMetadata($metadata);
    }
}
