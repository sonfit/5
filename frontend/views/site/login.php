<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Đăng nhập</h4>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div style="color:#999;margin:1em 0">
                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        <br>
                        Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                    </div>

                    <div class="form-group ">
                        <div  class="col-md-6 col-sm-6">
                            <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                        <div class="col-md-6 col-sm-6 pull-right">
                            <a href="<?php echo Yii::$app->homeUrl.'site/signup' ?>" class="btn btn-black">Đăng ký</a>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div >                <!-- Sign-in -->

            </div><!-- /.row -->

        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
