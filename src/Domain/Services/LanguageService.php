<?php

namespace ZnBundle\Language\Domain\Services;

use Illuminate\Support\Collection;
use ZnBundle\Language\Domain\Interfaces\Repositories\LanguageRepositoryInterface;
use ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface;
use ZnCore\Base\Libs\Service\Base\BaseCrudService;
use ZnCore\Base\Libs\EntityManager\Interfaces\EntityManagerInterface;

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

    public function allEnabled(): Collection
    {
        $query = $this->forgeQuery();
        $query->where('is_enabled', true);
        return $this->all($query);
    }
}
