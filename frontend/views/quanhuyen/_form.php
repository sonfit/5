<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quanhuyen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quanhuyen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'maqh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matp')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
