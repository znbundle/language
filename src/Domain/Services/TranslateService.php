<?php

namespace ZnBundle\Language\Domain\Services;

use ZnBundle\Language\Domain\Interfaces\Services\TranslateServiceInterface;
use ZnCore\Base\Libs\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\Base\Libs\Service\Base\BaseCrudService;
use ZnBundle\Language\Domain\Entities\TranslateEntity;

class TranslateService extends BaseCrudService implements TranslateServiceInterface
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass() : string
    {
        return TranslateEntity::class;
    }


}

