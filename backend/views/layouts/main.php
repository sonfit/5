<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap bg-info">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-2 aside-left bg-info">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <?php
                        $route = Yii::$app->controller->route;
                        $control = Yii::$app->controller->id;
                        ?>
                        <ul class="list-group" id="manage-menu">
                            <?php
                            echo Html::a('Trang chủ',['/'],['class'=>($control=='site')?'list-group-item active' : 'list-group-item']);
                            echo Html::a('Danh mục',['/categories'],['class'=>($control=='categories')?'list-group-item active' : 'list-group-item']);
                            echo Html::a('Thương hiệu',['/brand'],['class'=>($control=='brand')?'list-group-item active' : 'list-group-item']);
                            echo Html::a('Sản phẩm',['/product'],['class'=>($control=='product')?'list-group-item active' : 'list-group-item']);
                            echo Html::a('Quản lý đơn hàng',['/order'],['class'=>($control=='order')?'list-group-item active' : 'list-group-item']);
//                            echo Html::a('Chi tiết đơn',['/order-detail'],['class'=>($control=='order-detail')?'list-group-item active' : 'list-group-item']);
//                            echo Html::a('Quản lý file',['/file'],['class'=>($control=='file')?'list-group-item active' : 'list-group-item']);
//                            echo Html::a('Quản lý Home',['/homepages'],['class'=>($control=='homepages')?'list-group-item active' : 'list-group-item']);
//                            echo Html::a('Quản lý Slide',['/slidetop'],['class'=>($control=='slidetop')?'list-group-item active' : 'list-group-item']);
                            echo Html::a('Quản lý Banner',['/banner'],['class'=>($control=='banner')?'list-group-item active' : 'list-group-item']);
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-10 admin-right">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>

    $(function(){
        $('.custom_button').click(function(){
            $('#modalView').modal('show')
                .find('#modalContentView')
                .load($(this).attr('value'));
            });
        });

    function getDictrictShip(id){
        $.get('<?php echo Yii::$app->homeUrl.'?r=quanhuyen%2Fdictrict' ?>', {'id':id}, function (data) {
            $('#order-dictrict_ship').html(data);
        });
    }
    function getWardsShip(id){
        $.get('<?php echo Yii::$app->homeUrl.'?r=xaphuongthitran%2Fwards' ?>', {'id':id}, function (data) {
            $('#order-ward_ship').html(data);
        });
    }
</script>