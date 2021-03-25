<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cate_id') ?>

    <?= $form->field($model, 'cate_name') ?>

    <?= $form->field($model, 'cate_slug') ?>

    <?= $form->field($model, 'cate_parent') ?>

    <?= $form->field($model, 'cate_desc') ?>

    <?php // echo $form->field($model, 'cate_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
