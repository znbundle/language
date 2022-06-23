<?php

/**
 * @var View $this
 * @var Request $request
 * @var BookEntity $entity
 */

use yii\helpers\Url;
use yii\web\Request;
use yii\web\View;
use ZnBundle\Reference\Domain\Entities\BookEntity;
use ZnCore\Base\Libs\Status\Enums\StatusEnum;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;
use ZnLib\Web\Widgets\Detail\DetailWidget;
use ZnLib\Web\Widgets\Format\Formatters\EnumFormatter;
use ZnYii\Base\Helpers\ActionHelper;

$this->title = $entity->getName();

$attributes = [
    [
        'label' => 'ID',
        'attributeName' => 'id',
    ],
    [
        'label' => I18Next::t('core', 'main.attribute.name'),
        'attributeName' => 'name',
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
            <?= ActionHelper::generateUpdateAction($entity, '/language/bundle', ActionHelper::TYPE_BUTTON) ?>
<!--            --><?//= ActionHelper::generateRestoreOrDeleteAction($entity, '/reference/book', ActionHelper::TYPE_BUTTON) ?>
            <?= ActionHelper::generateDeleteAction($entity, '/language/bundle', ActionHelper::TYPE_BUTTON) ?>
        </div>

    </div>

</div>
