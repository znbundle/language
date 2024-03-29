<?php

/**
 * @var View $this
 * @var Request $request
 * @var DataProvider $dataProvider
 * @var ValidateEntityByMetadataInterface $filterModel
 */

use yii\helpers\Url;
use yii\web\Request;
use yii\web\View;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;
use ZnCore\Domain\Interfaces\Entity\ValidateEntityByMetadataInterface;
use ZnCore\Domain\Libs\DataProvider;
use ZnLib\Web\Widgets\Collection\CollectionWidget;

$this->title = I18Next::t('language', 'language.title');

/*
    private $ = null;
    private $ = null;*/

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
            return \ZnCore\Base\Legacy\Yii\Helpers\Html::a($title, ['/language/language/view', 'id' => $languageEntity->getId()]);
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
    [
        'formatter' => [
            'class' => \ZnLib\Web\Widgets\Format\Formatters\ActionFormatter::class,
            'actions' => [
                'update',
                'delete',
            ],
            'baseUrl' => '/language/language',
        ],
    ],
];

?>

<div class="row">

    <div class="col-lg-12">

        <?= CollectionWidget::widget([
            'dataProvider' => $dataProvider,
            'attributes' => $attributes,
        ]) ?>

        <div class="float-left">
            <a class="btn btn-primary" href="<?= Url::to(['/language/language/create']) ?>" role="button">
                <i class="fa fa-plus"></i>
                <?= I18Next::t('core', 'action.create') ?>
            </a>
        </div>

    </div>

</div>
