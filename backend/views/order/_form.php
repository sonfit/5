<?php

use backend\models\Payment;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'user_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province_ship')->dropDownList($province ,
        [
            'prompt'=>'--Select options--',
            'onchange'=>'getDictrictShip(this.value)'
        ])->label('Tỉnh/Thành phố') ?>

    <?= $form->field($model, 'dictrict_ship')->dropDownList($dictrict,
        [
            'prompt'=>'--Select options--',
            'onchange'=>'getWardsShip(this.value)'
        ])->label('Quận/Huyện') ?>
    <?= $form->field($model, 'ward_ship')->dropDownList($ward,
        [
            'prompt'=>'--Select options--',

        ])->label('Xã/Phường/Thị trấn') ?>

    <?= $form->field($model, 'resquest')->textInput(['maxlength' => true])->label('Ghi chú') ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'payment_id')->dropDownList($payment, ['prompt'=>'Chọn phương thức thanh toán']) ?>

    <?= $form->field($model, 'deliver_id')->dropDownList($deliver, ['prompt'=>'Chọn phương thức vận chuyển']) ?>

    <?= $form->field($model, 'status')->dropDownList(
                [
                    1=>'Đã đặt hàng',
                    2=>'Đang giao hàng',
                    3=>'Đã giao hàng',
                    4=>'Đơn hàng bị hủy',
                ]

    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end();?>



</div>
