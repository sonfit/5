<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Categories;

/* @var $this yii\web\View */
/* @var $model backend\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cate_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_slug')->textInput(['maxlength' => true]) ?>
    <?php $cat = new Categories(); ?>
    <?= $form->field($model, 'cate_parent')->dropDownList(
           $cat->getParent(),
        [
                'prompt'=>'Chọn danh mục cha'
        ]
    )?>
    <?= $form->field($model, 'cate_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_status')->dropDownList(
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
