<?php

use backend\models\Banner;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">
                            <?php $cate = \backend\models\Categories::find()->where(['cate_parent'=>0])->all();

                            if($cate) :
                                foreach ($cate as $item):
                                    ?>
                                    <li >
                                        <?php echo \yii\helpers\Html::a($item->cate_name,['/product/categories/','slug'=>$item->cate_slug]); ?>
                                    </li>
                                    <!-- /.menu-item -->
                                <?php endforeach; endif; ?>
                        </ul>
                        <!-- /.nav -->
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->

            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        <?php
                            $topSlide = new Banner();
                            $topSlide =  $topSlide->getBanner(0);
                            foreach ($topSlide as $item){
                        ?>


                        <div class="item" style="background-image: url(/5/uploads/banner/<?= $item['banner_image'] ?>);">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
<!--                                    <div class="slider-header fadeInDown-1">Top Brands</div>-->
                                    <div class="big-text fadeInDown-1"> <?= $item['banner_title'] ?> </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span><?= $item['banner_des'] ?></span> </div>
                                    <div class="button-holder fadeInDown-3"> <a href="<?= \yii\helpers\Url::base().'/'. $item['banner_button_link'] ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button"><?= $item['banner_button_text'] ?></a> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>

                        <?php } ?>
                        <!-- /.item -->



                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <?php $prod = \backend\models\Product::find()->orderBy(['created_at'=>SORT_DESC])->all();

                if($prod) :
                ?>
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">
                            <?=
                                 Html::a('Sản phẩm mới',['/product/']);
                                ?>
                        </h3>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    <?php foreach ($prod as $item ) : ?>

                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <?php echo \yii\helpers\Html::a(\yii\helpers\Html::img('@web/uploads/'.$item->prod_image),['/product/view/','slug'=>$item->prod_slug]); ?>
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                    <?php echo \yii\helpers\Html::a($item->prod_name,['/product/view/','slug'=>$item->prod_slug]); ?>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price"> <?php echo number_format($item->prod_price) . 'đ'; ?> </span>

                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <button type="submit" class="btn btn-primary" onclick="addCart(<?=$item->prod_id;?>)">

                                                    <i class="fa fa-shopping-cart inner-right-vs"></i> Thêm giỏ hàng
                                                </button>
                                                <!-- /.product-info -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    <?php endforeach; ?>

                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
               <?php endif; ?>
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="assets\images\banners\home-banner1.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="assets\images\banners\home-banner2.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <?php
                $botSlide = new Banner();
                $botSlide =  $botSlide->getBanner(2);
                foreach ($botSlide as $item){
                ?>
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="uploads/banner/<?= $item['banner_image'] ?>" alt=""> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right"><?= $item['banner_title']?><br>
                                            <span class="shopping-needs"><?= $item['banner_des']?></span></h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>

                <?php } ?>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
