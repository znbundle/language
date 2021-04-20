<?php

namespace ZnBundle\Language\Domain\Repositories\Eloquent;

use ZnLib\Db\Base\BaseEloquentCrudRepository;
use ZnBundle\Language\Domain\Entities\TranslateEntity;
use ZnBundle\Language\Domain\Interfaces\Repositories\TranslateRepositoryInterface;

class TranslateRepository extends BaseEloquentCrudRepository implements TranslateRepositoryInterface
{

    public function tableName() : string
    {
        return 'language_translate';
    }

    public function getEntityClass() : string
    {
        return TranslateEntity::class;
    }


}

