<?php

use backend\models\Payment;
use backend\models\Quanhuyen;
use backend\models\Tinhthanhpho;
use backend\models\Xaphuongthitran;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title =  'Thanh toán' ;
if($cart) :
    $docso = new \frontend\components\Cart();

    $payment = new Payment();
    $payment = ArrayHelper::map($payment->getAllPayment(),'pay_id','pay_name');
    $province = new Tinhthanhpho();
    $province = ArrayHelper::map($province->getAllProvince(),'matp','name');
    $dictrict = new Quanhuyen();
    $dictrict = ArrayHelper::map($dictrict->getAllDictrict(),'maqh','name');
    $ward = new Xaphuongthitran();
    $ward = ArrayHelper::map($ward->getAllWards(),'xaid','name');
?>

<div class="body-content outer-top-xs">
    <div class="body-content">
        <div class="container">
            <div class="terms-conditions-page">
                <div class="row">
                    <div class="col-md-12 terms-conditions">
                        <h2 class="heading-title">Đặt hàng thành công</h2>
                        <div class="">
                            <h3>Cảm ơn bạn. Đơn hàng của bạn đã được đặt thành công</h3>
                            <ul>
                                <li> Mã đơn hàng:  LARAVEL<?php echo $model['order_id']  ?></li>
                                <li> Ngày đặt hàng: <?php echo date("d-m-Y",$model['created_at']) ?></li>
                                <li> Tổng Tiền thanh toán: <?php echo '<b>'.number_format($model['total']).'</b>  -  (Bằng chữ: <i>'. $docso->convert_number_to_words($model['total']).'</i>)'; ?> </li>
                                <li> Phương thức thanh toán:<?php echo $payment[$model['payment_id']]?> </li>
                                <li> Địa chỉ thanh toán:
                                    <i> <?php echo $model['add_ship'].' - '.
                                            $ward[$model['ward_ship']] .' - ' .
                                            $dictrict[$model['dictrict_ship']].' - '.
                                            $province[$model['province_ship']]  ?>
                                    </i>
                                </li>
                                <li> Chi tiết đơn hàng đã được gửi vào địa chỉ mail của ban. </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div>
</div>



    <?php else : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error 404!</strong> Không có thông tin
        </div>

    <?php endif; ?>

