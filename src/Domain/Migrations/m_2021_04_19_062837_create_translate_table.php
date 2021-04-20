<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2021_04_19_062837_create_translate_table extends BaseCreateTableMigration
{

    protected $tableName = 'language_translate';
    protected $tableComment = '';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->string('bundle_name')->comment('');
            $table->string('category')->comment('');
            $table->string('lang_code')->comment('');
            $table->string('name')->comment('');
            $table->string('value')->comment('');
            $table->integer('status_id')->comment('');

            $table->unique(['bundle_name', 'category', 'lang_code', 'name']);
            $table
                ->foreign('bundle_name')
                ->references('name')
                ->on($this->encodeTableName('language_bundle'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('lang_code')
                ->references('code')
                ->on($this->encodeTableName('language'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }
}