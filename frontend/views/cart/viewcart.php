<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\components\Cart;
$docso = new Cart();


$this->title =  'Thông tin giỏ hàng' ;

$totalQty = $total = 0;


if($cart) :

?>
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive"  >
                            <table class="table" >
                                <thead id="listCart">
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Grandtotal</th>
                                </tr>
                                </thead><!-- /thead -->
                                <tfoot>
                                <tr>
                                    <td colspan="7">

                                    </td>
                                </tr>
                                </tfoot>
                                <tbody >
                                <?php
                                if(isset($cart)){
                                foreach ($cart as $key=>$item){
                                    $total += $item['prod_price']*$item['qty'];


                                    ?>
                                <tr >
                                    <td class="romove-item"><a href="javascript:void(0)" onclick="deleteCart(<?php echo $key ;?>) " title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="cart-image">
                                        <?php echo \yii\helpers\Html::a(\yii\helpers\Html::img('@web/uploads/'.$item['prod_image']),['/product/view/','slug'=>$item['prod_slug']]); ?>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><?php echo \yii\helpers\Html::a($item['prod_name'],['/product/view/','slug'=>$item['prod_slug']]); ?></h4>

                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <div class="arrows">
                                                <div class="arrow plus gradient" onclick="itemPlus(<?php echo $key ?>)"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                <div class="arrow minus gradient" onclick="itemMinus(<?php echo $key ?>)"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                            </div>
                                            <input type="text" id="qty_<?php echo $key ?>" name="qty_<?php echo $key ?>"  value="<?php echo number_format($item['qty']) ?>">
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo number_format($item['prod_price']) ; ?></span></td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo number_format($item['prod_price']*$item['qty']); ?></span></td>
                                </tr>
                                <?php }}?>

                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-6 col-sm-12 cart-shopping-total">
                        <div class="shopping-cart-btn">
                            <h4 class="name">Tổng tiền: <span ><?php echo number_format($total); ?></span> </h4>
                            <div class="description-container m-t-20">
                                <span  ><?php echo $docso->convert_number_to_words($total); ?></span>

                            </div><!-- /.description-container -->
                        </div><!-- /.product-info -->
                    </div>
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <div class="shopping-cart-btn">
                                <span class="">
                                    <a href="<?php echo Yii::$app->homeUrl?>" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                </span>
                        </div><!-- /.shopping-cart-btn -->
                    </div>
                    <div class="col-md-2 col-sm-12 cart-shopping-total">
                        <div class="cart-checkout-btn pull-right">
                            <a href="<?php echo Yii::$app->homeUrl.'cart/check-out' ?>" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                        </div>

                    </div><!-- /.cart-shopping-total -->





                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    <?php else : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error 404!</strong> Không có thông tin
        </div>
    <?php endif;  ?>

