<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prod_id') ?>

    <?= $form->field($model, 'cate_id') ?>

    <?= $form->field($model, 'prod_name') ?>

    <?= $form->field($model, 'prod_slug') ?>

    <?= $form->field($model, 'prod_image') ?>

    <?php // echo $form->field($model, 'prod_content') ?>

    <?php // echo $form->field($model, 'prod_desc') ?>

    <?php // echo $form->field($model, 'prod_price') ?>

    <?php // echo $form->field($model, 'prod_qty') ?>

    <?php // echo $form->field($model, 'prod_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
