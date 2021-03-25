<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Categories;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
$cat = new Categories;
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'cate_id')->dropDownList(
            $cat->getParent()
    ) ?>

    <?= $form->field($model, 'prod_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prod_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'prod_content')->textarea(['id' => 'content']) ?>

    <?= $form->field($model, 'prod_desc')->textarea(['id' => 'desc']) ?>

    <?= $form->field($model, 'prod_price')->textInput() ?>

    <?= $form->field($model, 'prod_qty')->textInput() ?>

    <?= $form->field($model, 'prod_status')->dropDownList(
            [
                0=>'Ẩn',
                1=> 'Hiện'
            ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
