<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_status')->dropDownList(
        [
            1=>'Hiện',
            0=>'Ẩn'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
