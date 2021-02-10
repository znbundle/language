<?php

namespace ZnBundle\Language\Domain\Services;

use ZnBundle\Language\Domain\Interfaces\Repositories\LanguageRepositoryInterface;
use ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface;
use ZnCore\Domain\Base\BaseCrudService;
use ZnCore\Domain\Interfaces\Libs\EntityManagerInterface;

class LanguageService extends BaseCrudService implements LanguageServiceInterface
{

    private $switchRepository;
    private $storageRepository;

    public function __construct(
        EntityManagerInterface $em,
        LanguageRepositoryInterface $repository
    )
    {
        $this->setEntityManager($em);
        $this->repository = $repository;
    }
}
