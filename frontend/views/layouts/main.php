<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
//use Yii;
use yii\web\Controller;
use Yii\web\Session;

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


<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">

<!--                        <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>-->
                        <li><a href="<?php echo Yii::$app->homeUrl.'cart/view-cart' ?>"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl.'cart/check-out' ?>"><i class="icon fa fa-check"></i>Checkout</a></li>
                        <?php if(Yii::$app->user->isGuest) { ?>
                        <li><a href="<?php echo Yii::$app->homeUrl.'site/login' ?>"><i class="icon fa fa-lock"></i>Đăng nhập</a></li>
                        <?php } else{ ?>
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li>
                                <?php
                                    echo Html::a('Đăng xuất', Yii::$app->homeUrl.'site/logout',
                                        [
                                            'data' => [
                                                'method' => 'post',
                                            ],
                                        ]
                                    );
                                ?>
                            </li>
                        <?php }?>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="<?= \yii\helpers\Url::base() ?>"> <?= Html::img('@web/assets/images/logo.png', ['alt' => 'My logo']) ?> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <input class="search-field" placeholder="Search here...">
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
                <!-- /.top-search-holder -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="<?= \yii\helpers\Url::base() ?>" data-hover="dropdown"  >Home</a> </li>
                                <li class="dropdown yamm mega-menu"> <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    <?php $cate = \backend\models\Categories::find()->where(['cate_parent'=>0])->all();

                                                    if($cate) :
                                                    foreach ($cate as $item) :
                                                    ?>
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title"><?php echo $item->cate_name; ?></h2>
                                                        <?php
                                                        $child = \backend\models\Categories::find()->where(['cate_parent'=>$item->cate_id])->all();
                                                        if ($child) :
                                                            foreach ($child as $i) :
                                                                ?>
                                                        <ul class="links">
                                                            <li><a href="#"><?php echo $i->cate_name; ?></a></li>
                                                        </ul>
                                                        <?php endforeach; endif; ?>
                                                    </div>
                                                    <?php endforeach; endif; ?>
                                                    <!-- /.col -->
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown"> <a href="contact.html">Giới thiệu</a> </li>
                                <li class="dropdown"> <a href="contact.html">Liên hệ</a> </li>

                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div id="content">
<?php echo $content; ?>
</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>+(888) 123-4567<br>
                                        +(888) 456-7890</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">flipmart@themesground.com</a></span> </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                            <li><a href="#" title="About us">Order History</a></li>
                            <li><a href="#" title="faq">FAQ</a></li>
                            <li><a href="#" title="Popular Searches">Specials</a></li>
                            <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="#">About us</a></li>
                            <li><a title="Information" href="#">Customer Service</a></li>
                            <li><a title="Addresses" href="#">Company</a></li>
                            <li><a title="Addresses" href="#">Investor Relations</a></li>
                            <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                            <li><a href="#" title="Blog">Blog</a></li>
                            <li><a href="#" title="Company">Company</a></li>
                            <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                            <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                    <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                    <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                    <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->



<?php $this->endBody() ?>

<script>

    var beFor;
    var idPro;
    var quantity;
    i=0;

    function addCart(id){
        num = $('#number').val();
        number = 1;
        if(num > 0){
            number = num;
        }

        $.get('<?php echo Yii::$app->homeUrl.'cart/add-cart' ?>', {'prod_id':id,'num':number}, function (data) {
            swal("Thành công!", "Thêm giỏ hàng thành công!", "success");
        val = data.split('-');

        $('#qty').text(val[0]);
        $('#total').text(val[1]);
        // $('#item_'+id).update();
        // update($('#item_'+id));

        });
    }

 function  deleteCart(id){
     swal({
             title: "Are you sure?",
             text: "Bạn có chắc muốn xóa sản phẩm khỏi giỏ hàng!",
             type: "warning",
             showCancelButton: true,
             confirmButtonClass: "btn-danger",
             confirmButtonText: "Yes, delete it!",
             closeOnConfirm: false
         },
         function(){
             swal("Thành công!", "Bạn đã xóa sản phẩm khỏi giỏ hàng thành công.", "success");
             $.get('<?php echo Yii::$app->homeUrl.'cart/delete-cart' ?>', {'prod_id':id}, function (data) {
                 $('#content').html(data);
             });
         });

    }
    function updateCart(id,num){

        num = $('#qty_'+id ).val();
        $.get('<?php echo Yii::$app->homeUrl.'cart/update-cart' ?>', {'prod_id':id,'num':num}, function (data) {
                $('#content').html(data);
        });
    }

    function getDictrict(id){
        $.get('<?php echo Yii::$app->homeUrl.'quanhuyen/dictrict' ?>', {'id':id}, function (data) {
            $('#dictrict').html(data);
        });
    }
    function getWards(id){
        $.get('<?php echo Yii::$app->homeUrl.'xaphuongthitran/wards' ?>', {'id':id}, function (data) {
            $('#wards').html(data);
        });
    }
    function getDictrictShip(id){
        $.get('<?php echo Yii::$app->homeUrl.'quanhuyen/dictrict' ?>', {'id':id}, function (data) {
            $('#order-dictrict_ship').html(data);
        });
    }
    function getWardsShip(id){
        $.get('<?php echo Yii::$app->homeUrl.'xaphuongthitran/wards' ?>', {'id':id}, function (data) {
            $('#order-ward_ship').html(data);
        });
    }


    function itemPlus(id){
        qty =  parseInt($('#qty_'+id).val())+1;
        $('#qty_'+id).val(qty);
        updateCart(id,qty);
    }

    function itemMinus(id){
        qty =  parseInt($('#qty_'+id).val())-1;
        if(qty == 0){
            deleteCart(id)
        }else {
            $('#qty_'+id).val(qty);
            updateCart(id,qty);
        }
    }

    function changeItem(){
        if($('#check').prop('checked')){
            $('#order-user_ship').val($('#user-username').val());
            $('#order-email_ship').val($('#user-email').val());
            $('#order-phone_ship').val($('#user-phone').val());
            $('#order-add_ship').val($('#user-add').val());
            $('#order-province_ship').val($('#province').val());
            $('#order-dictrict_ship').val($('#dictrict').val());
            $('#order-ward_ship').val($('#wards').val());
        }else {
            $('#order-user_ship').val('');
            $('#order-email_ship').val('');
            $('#order-phone_ship').val('');
            $('#order-add_ship').val('');
            $('#order-province_ship').val('');
            $('#order-dictrict_ship').val('');
            $('#order-ward_ship').val('');

        }
    }




</script>

</body>
</html>
<?php $this->endPage() ?>
