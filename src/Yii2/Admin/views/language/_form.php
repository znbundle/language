<?php

/**
 * @var View $this
 * @var Request $request
 * @var BookForm $model
 */

use Packages\Library\Yii2\Admin\Forms\BookForm;
use yii\helpers\Html;
use yii\web\Request;
use yii\web\View;
use yii\widgets\ActiveForm;
use ZnCore\Base\I18Next\Facades\I18Next;
use ZnYii\Assets\Summernote\SummernoteAsset;
use ZnYii\Web\Widgets\CancelButton\CancelButtonWidget;

SummernoteAsset::register($this);

?>

<div class="row">

    <div class="col-lg-12">

        <?php $form = ActiveForm::begin(['id' => 'classform']) ?>

        <div class="form-row">
            <div class="form-group col-md-12">
                <?= Html::activeLabel($model, 'code'); ?>
                <?= Html::activeTextInput($model, 'code', ['class' => 'form-control']); ?>
                <?= Html::error($model, 'code', ['class' => 'text-danger']); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <?= Html::activeLabel($model, 'title'); ?>
                <?= Html::activeTextInput($model, 'title', ['class' => 'form-control']); ?>
                <?= Html::error($model, 'title', ['class' => 'text-danger']); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <?= Html::activeLabel($model, 'name'); ?>
                <?= Html::activeTextInput($model, 'name', ['class' => 'form-control']); ?>
                <?= Html::error($model, 'name', ['class' => 'text-danger']); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <?= Html::activeLabel($model, 'locale'); ?>
                <?= Html::activeTextInput($model, 'locale', ['class' => 'form-control']); ?>
                <?= Html::error($model, 'locale', ['class' => 'text-danger']); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <?= Html::activeLabel($model, 'isMain'); ?>
                <?= Html::activeCheckbox($model, 'isMain', ['class' => 'form-control']); ?>
                <?= Html::error($model, 'isMain', ['class' => 'text-danger']); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <?= Html::activeLabel($model, 'isEnabled'); ?>
                <?= Html::activeCheckbox($model, 'isEnabled', ['class' => 'form-control']); ?>
                <?= Html::error($model, 'isEnabled', ['class' => 'text-danger']); ?>
            </div>
        </div>

        <?= Html::submitButton(I18Next::t('core', 'action.save'), ['class' => 'btn btn-success']) ?>

        <?= CancelButtonWidget::widget() ?>

        <?php ActiveForm::end() ?>

    </div>

</div>
