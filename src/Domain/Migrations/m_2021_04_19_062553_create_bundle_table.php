<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;

class m_2021_04_19_062553_create_bundle_table extends BaseCreateTableMigration
{

    protected $tableName = 'language_bundle';
    protected $tableComment = '';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->string('name')->comment('');

            $table->unique('name');
        };
    }
}