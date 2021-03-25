<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Đăng ký tài khoản</h4>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <!-- create a new account -->
            </div><!-- /.row -->

        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
