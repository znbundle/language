<?php

namespace ZnBundle\Language\Domain\Services;

use ZnBundle\Language\Domain\Interfaces\Repositories\LanguageRepositoryInterface;
use ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface;
use ZnCore\Collection\Interfaces\Enumerable;
use ZnCore\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\Service\Base\BaseCrudService;

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
