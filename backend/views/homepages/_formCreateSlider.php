<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Homepages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homepages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'home_key')->textInput(['maxlength' => true,  'name'=> 'slide_title',  'id'=> 'slide_title'])->label('Tiêu đề slide') ?>
    <?= $form->field($model, 'home_key')->textInput(['maxlength' => true,  'name'=> 'slide_des',  'id'=> 'slide_des'])->label('Mô tả slide') ?>
    <?= $form->field($model, 'home_key')->textInput(['maxlength' => true,  'name'=> 'slide_button_link',  'id'=> 'slide_button_link'])->label('Link của nút') ?>
    <?= $form->field($model, 'home_key')->textInput(['maxlength' => true,  'name'=> 'slide_button_text',  'id'=> 'slide_button_text'])->label('Text của nút') ?>
    <?= $form->field($model, 'home_key')->fileInput(['maxlength' => true,  'name'=> 'slide_button_text',  'id'=> 'slide_button_text'])->label('Upload Ảnh') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
