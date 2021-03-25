<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = ($model) ? $model->prod_name : 'Not fount';
if($model) :
?>

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>


                <div class='col-md-12'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p8.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p8.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide2">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p9.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p9.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide3">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p10.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p10.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide4">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p11.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p11.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide5">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p12.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p12.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide6">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p13.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p13.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide7">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p14.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p14.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide8">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p15.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p15.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide9">
                                            <a data-lightbox="image-1" data-title="Gallery" href="\5\assets\images\products\p16.jpg">
                                                <img class="img-responsive" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p16.jpg">
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p17.jpg">
                                                </a>
                                            </div>

                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p18.jpg">
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p19.jpg">
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p20.jpg">
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p21.jpg">
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p22.jpg">
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="7" href="#slide7">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p23.jpg">
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide8">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p24.jpg">
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="9" href="#slide9">
                                                    <img class="img-responsive" width="85" alt="" src="\5\assets\images\blank.gif" data-echo="/5/assets/images/products/p25.jpg">
                                                </a>
                                            </div>
                                        </div><!-- /#owl-single-product-thumbnails -->



                                    </div><!-- /.gallery-thumbs -->

                                </div>
                                <!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class="col-sm-6 col-md-7 product-info-block">
                                <div class="product-info">
                                    <h1 class="name"><?php echo $model->prod_name; ?></h1>
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Tình trạng :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value"> <?php echo ($model->prod_status == 1)  ?  'Còn hàng' :  'Hết hàng'; ?></span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        <?php echo $model->prod_desc; ?>
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price"><?php echo number_format($model->prod_price) . 'đ'; ?></span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" name="number" id="number" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary" onclick="addCart(<?=$model->prod_id;?>)">
                                                    <i class="fa fa-shopping-cart inner-right-vs"></i> Thêm giỏ hàng
                                                </button>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text"><?php echo $model->prod_content; ?> </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Sản phẩm tương tự</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            <?php $cateP = \backend\models\Product::find()->where(['cate_id'=>$model->cate_id])->all();
                            foreach ($cateP as $cate) :
                                ?>

                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <?php echo \yii\helpers\Html::a(\yii\helpers\Html::img('@web/uploads/'.$cate->prod_image),['/product/view/','slug'=>$cate->prod_slug]); ?>
                                                </div>
<!--                                                <div class="tag new"><span>new</span></div>-->
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name">
                                                    <?php echo \yii\helpers\Html::a($cate->prod_name,['/product/view/','slug'=>$cate->prod_slug]); ?>
                                                </h3>
                                                <div class="product-price">
                                                    <span class="price"> <?php echo number_format($cate->prod_price) . 'đ'; ?> </span>

                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <button type="submit" class="btn btn-primary" onclick="addCart(<?=$cate->prod_id;?>)">
                                                <i class="fa fa-shopping-cart inner-right-vs"></i> Thêm giỏ hàng
                                            </button>
                                            <!-- /.product-info -->
                                        </div>
                                        <!-- /.product -->

                                    </div>
                                    <!-- /.products -->
                                </div>
                            <?php endforeach;?>

                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->

                <div class="clearfix"></div>
            </div><!-- /.row -->
           </div><!-- /.body-content -->


<?php else : ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error 404!</strong> Không có thông tin
    </div>
<?php endif; ?>

