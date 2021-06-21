<?php

/**
 * @var View $this
 * @var Request $request
 * @var BookEntity $entity
 */

use Packages\Library\Domain\Entities\BookEntity;
use yii\web\Request;
use yii\web\View;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;
use ZnLib\Web\Widgets\Detail\DetailWidget;
use ZnLib\Web\Widgets\Format\Formatters\LinkFormatter;
use ZnYii\Base\Helpers\ActionHelper;

$this->title = $entity->getTitle();

$attributes = [
    [
        'label' => 'ID',
        'attributeName' => 'id',
    ],
    [
        'label' => I18Next::t('language', 'language.attribute.title'),
        'attributeName' => 'title',
        'value' => function(\ZnBundle\Language\Domain\Entities\LanguageEntity $languageEntity) {
            $title = '<i class="flag-icon flag-icon-'.$languageEntity->getCode().'"></i> ' . $languageEntity->getTitle();
            return $title;
        },
        'format' => 'html',
    ],
    [
        'label' => I18Next::t('language', 'language.attribute.name'),
        'attributeName' => 'name',
    ],
    [
        'label' => I18Next::t('language', 'language.attribute.code'),
        'attributeName' => 'code',
    ],
    [
        'label' => I18Next::t('language', 'language.attribute.locale'),
        'attributeName' => 'locale',
    ],
    [
        'label' => I18Next::t('language', 'language.attribute.isMain'),
        'attributeName' => 'isMain',
    ],
    [
        'label' => I18Next::t('language', 'language.attribute.isEnabled'),
        'attributeName' => 'isEnabled',
    ],
];

?>

<div class="row">

    <div class="col-lg-12">

        <?= DetailWidget::widget([
            'entity' => $entity,
            'attributes' => $attributes,
        ]) ?>

        <div class="float-left">
            <?= ActionHelper::generateUpdateAction($entity, '/language/language', ActionHelper::TYPE_BUTTON) ?>
            <?= ActionHelper::generateDeleteAction($entity, '/language/language', ActionHelper::TYPE_BUTTON) ?>
        </div>

    </div>

</div>
