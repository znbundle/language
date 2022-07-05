<?php

namespace ZnBundle\Language\Domain\Services;

use ZnCore\Domain\Collection\Interfaces\Enumerable;
use ZnCore\Domain\Collection\Libs\Collection;
use ZnBundle\Language\Domain\Interfaces\Repositories\LanguageRepositoryInterface;
use ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface;
use ZnCore\Domain\Service\Base\BaseCrudService;
use ZnCore\Domain\EntityManager\Interfaces\EntityManagerInterface;

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
        $this->setRepository($repository);
    }

    public function allEnabled(): Enumerable
    {
        $query = $this->forgeQuery();
        $query->where('is_enabled', true);
        return $this->findAll($query);
    }
}
