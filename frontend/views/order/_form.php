<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dictrict_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ward_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resquest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'deliver_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
