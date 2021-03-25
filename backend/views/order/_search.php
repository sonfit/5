<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_ship') ?>

    <?= $form->field($model, 'email_ship') ?>

    <?= $form->field($model, 'phone_ship') ?>

    <?php // echo $form->field($model, 'add_ship') ?>

    <?php // echo $form->field($model, 'province_ship') ?>

    <?php // echo $form->field($model, 'dictrict_ship') ?>

    <?php // echo $form->field($model, 'ward_ship') ?>

    <?php // echo $form->field($model, 'resquest') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'payment_id') ?>

    <?php // echo $form->field($model, 'deliver_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
