<?php

use yii\data\Pagination;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Banner;
use backend\models\Product;
use backend\models\Categories;
use backend\models\Brand;
use yii\widgets\LinkPager;

//$this->title = $model->cate_name;
$this->params['breadcrumbs'][] = $this->title;

$query = new yii\db\Query();


$catep = Categories::find()->where(['cate_slug'=>$_GET['slug']])->one();
$prod =$query
    -> from(['tbl_product'])
    ->where(['cate_id'=>$catep->cate_id])->all();


$data = Brand::find()
    ->where(['brand_id'=> $prod])
    ->all();

if(isset($_GET['brand_slug'])) {
    $brand = Brand::find()->where(['brand_slug' => $_GET['brand_slug']])->one();
    $prod =$query
        -> from(['tbl_product'])
        ->where(['cate_id'=>$catep->cate_id])
        ->andWhere(['brand_id'=>$brand->brand_id])->all();

}





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
                            <?php $cate = Categories::find()->all();
                            if($cate) :
                                foreach ($cate as $c):
                                    ?>
                                    <li >
                                        <?php echo \yii\helpers\Html::a($c->cate_name,['/product/categories/','slug'=>$c->cate_slug]); ?>
                                    </li>
                                    <!-- /.menu-item -->
                                <?php endforeach; endif; ?>
                        </ul>
                        <!-- /.nav -->
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                        <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                            <h3 class="section-title">Thương hiệu</h3>
                            <div class="sidebar-widget-body outer-top-xs">

                                <div class="tag-list">
                                    <?php
//                                            if ($data) :
                                            foreach ($data as $i) :
                                                if(isset($_GET['brand_slug'])){
                                                    echo Html::a($i['brand_name'],['/product/categories/','slug'=>$_GET['slug'], 'brand_slug'=>$i['brand_slug']], ['class'=>($i['brand_slug']==$_GET['brand_slug'])?'item active' : 'item']);
                                                }else{
                                                    echo Html::a($i['brand_name'],['/product/categories/','slug'=>$_GET['slug'], 'brand_slug'=>$i['brand_slug']],['class'=>'item']);
                                                }
                                            endforeach; ?>
                                </div>
                                <!-- /.tag-list -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                    </div>
                    <!-- /.sidebar-filter -->
                </div>

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
                        foreach ($topSlide as $top){
                            ?>
                            <div class="item" style="background-image: url(/5/uploads/banner/<?= $top['banner_image'] ?>);">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <!--                                    <div class="slider-header fadeInDown-1">Top Brands</div>-->
                                        <div class="big-text fadeInDown-1"> <?= $top['banner_title'] ?> </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span><?= $top['banner_des'] ?></span> </div>
                                        <div class="button-holder fadeInDown-3"> <a href="<?= Url::base().'/'.$top['banner_button_link'] ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button"><?= $top['banner_button_text'] ?></a> </div>
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
                <!-- ============================================== SCROLL TABS ============================================== -->


                <?php
                if($prod) :
                    ?>
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left"><?= $catep->cate_name  ?> </h3>
                            <!-- /.nav-tabs -->
                        </div>
                        <div class="search-result-container ">
                            <div id="myTabContent" class="tab-content category-list">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product">
                                        <div class="row">
                                            <?php foreach ($prod as $item ) :
                                                ?>

                                                <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image" >
                                                                    <?php echo \yii\helpers\Html::a(\yii\helpers\Html::img('@web/uploads/'.$item['prod_image']),['/product/view/','slug'=>$item['prod_slug']]); ?>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-image -->

                                                            <div class="product-info text-left">
                                                                <h3 class="name">
                                                                    <?php echo \yii\helpers\Html::a($item['prod_name'],['/product/view/','slug'=>$item['prod_slug']]); ?>
                                                                </h3>
                                                                <div class="product-price">
                                                                    <span class="price"> <?php echo number_format($item['prod_price']) . 'đ'; ?> </span>

                                                                </div>
                                                                <!-- /.product-price -->

                                                            </div>
                                                            <button type="submit" class="btn btn-primary" onclick="addCart(<?=$item['prod_id'];?>)">

                                                                <i class="fa fa-shopping-cart inner-right-vs"></i> Thêm giỏ hàng
                                                            </button>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.product -->

                                                    </div>
                                                    <!-- /.products -->
                                                </div>
                                            <?php endforeach;
                                            ?>
                                            <!-- /.item -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.category-product -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->

                        </div>

                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                <?php

                endif; ?>



                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <?php
                $botSlide = new Banner();
                $botSlide =  $botSlide->getBanner(2);
                foreach ($botSlide as $item){
                    ?>
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive" src="../uploads/banner/<?= $item['banner_image'] ?>" alt=""> </div>
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

