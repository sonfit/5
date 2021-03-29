<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'banner_title')->textInput(['maxlength' => true])->label('Tiêu đề Banner') ?>

    <?= $form->field($model, 'banner_des')->textInput(['maxlength' => true])->label('Mô tả Banner') ?>

    <?= $form->field($model, 'banner_button_link')->textInput(['maxlength' => true])->label('Link của nút') ?>

    <?= $form->field($model, 'banner_button_text')->textInput(['maxlength' => true])->label('Text của nút') ?>

    <?= $form->field($model, 'banner_status')->dropDownList(
        [
            0 =>'Top Banner',
            1 =>'Mid',
            2 =>'Bot',
        ]
    )->label('Vị trí Banner') ?>

    <?= $form->field($model, 'file')->fileInput()->label('Upload Ảnh')  ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
