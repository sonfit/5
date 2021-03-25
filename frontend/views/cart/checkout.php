<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\components\Cart;
use yii\widgets\ActiveForm;
use common\models\User;
use backend\models\Order;
use backend\models\Tinhthanhpho;
$docso = new Cart();
//$user = new Order();


$this->title =  'Xác nhận thanh toán' ;

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
                                            <td class="cart-image">
                                                <?php echo \yii\helpers\Html::a(\yii\helpers\Html::img('@web/uploads/'.$item['prod_image']),['/product/view/','slug'=>$item['prod_slug']]); ?>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><?php echo \yii\helpers\Html::a($item['prod_name'],['/product/view/','slug'=>$item['prod_slug']]); ?></h4>

                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <?php echo number_format($item['qty']) ?>
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
                                    <a href="<?php echo Yii::$app->homeUrl.'cart/view-cart' ?>" class="btn btn-upper btn-primary outer-left-xs">Xem lại giỏ hàng</a>
                                </span>
                        </div><!-- /.shopping-cart-btn -->
                    </div>
                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    <?php if($cart) :
    if(isset($province)): ?>
        <div class="body-content outer-top-xs" >
            <div class="container">
                <div class="row ">
                    <div class="shopping-cart">
                        <?php $form = ActiveForm::begin(); ?>

                            <div class="col-md-4 col-sm-12 estimate-ship-tax">
                                <h3>Thông tin mua hàng</h3>
                                <p>Nhập đầy đủ thông tin người mua hàng</p>

                                <?= $form->field($user, 'username')->textInput(['maxlength' => true,'placeholder'=>'Tên người mua hàng'])->label('Tên người mua hàng') ?>
                                <?= $form->field($user, 'email')->textInput(['maxlength' => true,'placeholder'=>'Email'])->label('Email ') ?>
                                <?= $form->field($user, 'phone')->textInput(['maxlength' => true,'placeholder'=>'Số điện thoại'])->label('Số điện thoại ') ?>
                                <?= $form->field($user, 'add')->textInput(['maxlength' => true,'placeholder'=>'Địa chỉ '])->label('Địa chỉ ') ?>
                                <?= $form->field($user, 'province')->dropDownList($province ,
                                    [
                                        'prompt'=>'--Select options--',
                                        'id' => 'province',
                                        'name'=>'province',
                                        'onchange'=>'getDictrict(this.value)'
                                    ])->label('Tỉnh/Thành phố') ?>

                                <?= $form->field($user, 'dictrict')->dropDownList($dictrict,
                                    [
                                        'prompt'=>'--Select options--',
                                        'id' => 'dictrict',
                                        'name'=>'dictrict',
                                        'onchange'=>'getWards(this.value)'
                                    ])->label('Quận/Huyện') ?>
                                <?= $form->field($user, 'ward')->dropDownList($ward,
                                    [
                                        'prompt'=>'--Select options--',
                                        'id' => 'wards',
                                        'name'=>'wards',
                                    ])->label('Xã/Phường/Thị trấn') ?>



                            </div><!-- /.estimate-ship-tax -->
                            <div class="col-md-4 col-sm-12 estimate-ship-tax">
                                <h3></h3>

                                    <label for="check">
                                        <input type="checkbox" id="check" name="check" onchange="changeItem(this.id)">
                                        Người nhận cùng địa chỉ
                                    </label>
                                <?= $form->field($model, 'payment_id')->dropDownList($payment, ['prompt'=>'Chọn phương thức thanh toán']) ?>
                                <?= $form->field($model, 'deliver_id')->dropDownList($deliver, ['prompt'=>'Chọn phương thức vận chuyển']) ?>
                                <?= $form->field($model, 'resquest')->textarea(['maxlength' => true,'placeholder'=>'ghi chú ...'])->label('Ghi chú ') ?>
                            </div><!-- /.cart-shopping-total -->

                            <div class="col-md-4 col-sm-12 estimate-ship-tax">

                                <h3>Thông tin nhận hàng</h3>
                                <p>Nhập đầy đủ thông tin người nhận hàng</p>

                                <?= $form->field($model, 'user_ship')->textInput(['maxlength' => true,'placeholder'=>'Tên người nhận hàng'])?>

                                <?= $form->field($model, 'email_ship')->textInput(['maxlength' => true, 'placeholder'=>'Email người nhận hàng']) ?>

                                <?= $form->field($model, 'phone_ship')->textInput(['maxlength' => true, 'placeholder'=>'Số điện thoại người nhận hàng']) ?>

                                <?= $form->field($model, 'add_ship')->textInput(['maxlength' => true, 'placeholder'=>'Địa chỉ']) ?>

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
                            </div><!-- /.estimate-ship-tax -->
                            <div class="form-group">
                                <?= Html::submitButton('Xác nhận', ['class' => 'btn btn-primary']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div><!-- /.shopping-cart -->
                </div> <!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.body-content -->
    <?php endif;endif;?>

<?php else : ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error 404!</strong> Không có thông tin
    </div>
<?php endif;  ?>





