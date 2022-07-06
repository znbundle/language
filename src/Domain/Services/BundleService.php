<?php

namespace ZnBundle\Language\Domain\Services;

use ZnBundle\Language\Domain\Interfaces\Services\BundleServiceInterface;
use ZnCore\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\Service\Base\BaseCrudService;
use ZnBundle\Language\Domain\Entities\BundleEntity;

class BundleService extends BaseCrudService implements BundleServiceInterface
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass() : string
    {
        return BundleEntity::class;
    }


}

