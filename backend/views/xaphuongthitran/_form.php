<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Xaphuongthitran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xaphuongthitran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'xaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maqh')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
