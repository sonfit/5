<?php
namespace frontend\controllers;
use backend\models\Deliver;
use backend\models\OrderDetail;
use backend\models\Payment;
use backend\models\Product;
use backend\models\Quanhuyen;
use backend\models\Tinhthanhpho;
use backend\models\Xaphuongthitran;
use common\models\User;
use frontend\components\Cart;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii\web\Session;
use backend\models\Order;
use backend\models\search\Order as OrderSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\components\sendmail\sendMail;

class CartController extends Controller
{
    public function actionAddCart($prod_id,$num){

        $model = Product::findOne(['prod_id'=>$prod_id]);
        $cart = new Cart();
        $cart->addCart($prod_id,$model,$num);
        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        $totalQty = $total = 0;
            foreach ($infoCart as$key =>$item){
                $totalQty += $item['qty'];
                $total += $item['prod_price']*$item['qty'];
            }
        return $this->renderAjax('index',['cartInfo'=>$totalQty.'-'.$total]);
    }

    public function actionDeleteCart($prod_id)
    {
        $cart = new Cart();
        $cart->delCart($prod_id);
        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        $totalQty = $total = 0;
        foreach ($infoCart as $key =>$item){
            $totalQty += $item['qty'];
            $total += $item['prod_price']*$item['qty'];
        }
        return $this->renderAjax('viewcart',['cart'=>$infoCart]);

    }

    public function actionUpdateCart($prod_id,$num){

        $model = Product::findOne(['prod_id'=>$prod_id]);
        $cart = new Cart();
        $cart->updateCart($prod_id,$num);

        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        $totalQty = $total = 0;
        foreach ($infoCart as$key =>$item){
            $totalQty += $item['qty'];
            $total += $item['prod_price']*$item['qty'];
        }
        return $this->renderAjax('viewcart',['cart'=>$infoCart]);
    }

    public  function actionViewCart()
    {
        $session = Yii::$app->session;
        return $this->render('viewCart',['cart'=>$session['cart']]);
    }

    public  function actionCheckOut()
    {

        $docso = new Cart();
        $cart = Yii::$app->session['cart'];
        $user = new User();
        $model = new Order();
        $model->user_id = 0;
        $province = new Tinhthanhpho();
        $province = ArrayHelper::map($province->getAllProvince(),'matp','name');
        $dictrict = new Quanhuyen();
        $dictrict = ArrayHelper::map($dictrict->getAllDictrict(),'maqh','name');
        $ward = new Xaphuongthitran();
        $ward = ArrayHelper::map($ward->getAllWards(),'xaid','name');

        if(!Yii::$app->user->isGuest){
            $user->username = Yii::$app->user->identity->username;
            $user->email    = Yii::$app->user->identity->email;
            $user->phone    = Yii::$app->user->identity->phone;
            $user->add      = Yii::$app->user->identity->add;
            $user->province = Yii::$app->user->identity->province;
            $user->dictrict = Yii::$app->user->identity->dictrict;
            $user->ward     = Yii::$app->user->identity->ward;
            $model->user_id                             = Yii::$app->user->id;

        }
        $payment = new Payment();
        $payment = ArrayHelper::map($payment->getAllPayment(),'pay_id','pay_name');
        $deliver = new Deliver();
        $deliver = ArrayHelper::map($deliver->getAllDeliver(),'deliver_id','deliver_name');
        $total = 0;
        if(isset($cart)){
            foreach ($cart as $key=>$value){
                $total += $value['qty']*$value['prod_price'];
            }
        }
        $model->total = $total;
        $model->created_at = time();
        $model->updated_at =time();
        $model->status =1;
        if ($model->load(Yii::$app->request->post()) && $model->save() ) {

            $infoPost = Yii::$app->request->post();
            $body = '<h2 class="heading-title">?????t h??ng th??nh c??ng</h2>
                        <div class="">
                            <h3>C???m ??n b???n. ????n h??ng c???a b???n ???? ???????c ?????t th??nh c??ng</h3>
                            <ul>
                                <li> M?? ????n h??ng: LARAVEL'.$model['order_id'].'</li>
                                <li> Ng??y ?????t h??ng: '. date("d-m-Y",$model['created_at']) .'</li>
                                <li> T??n ng?????i nh???n h??ng: '. $model['user_ship'] .'</li>
                                <li> S??? ??i???n tho???i ng?????i nh???n: '. $model['phone_ship'] .'</li>
                                <li> T???ng Ti???n thanh to??n: <b>'.number_format($model['total']).'</b>  -  (B???ng ch???: <i>'.$docso->convert_number_to_words($model['total']).'</i>)</li>
                                <li> Ph????ng th???c thanh to??n:  '. $payment[$model['payment_id']].' </li>
                                <li> ?????a ch??? thanh to??n:
                                    <i> '.$model['add_ship'].' - '.$ward[$model['ward_ship']].' - '.$dictrict[$model['dictrict_ship']].' - '.$province[$model['province_ship']].'   </i>
                                </li>
                                 <li> Ghi ch??:  '.$model['resquest'].' </li>
                            </ul>
                            <h4> Chi ti???t ????n h??ng ???? ???????c g???i v??o ?????a ch??? mail c???a ban. </h4>
                        </div>';
            $body .= '<table><tr style="text-align: center">
                        <td style="width: 10%;">Item</td>
                        <td style="width: 40%;">T??n s???n ph??m</td>
                        <td style="width: 15%;">Gi??</td> 
                        <td style="width: 10%;">s??? l?????ng</td>
                        <td style="width: 15%;">Total</td> 
                         <td></td></tr>';
            $i = 1;
            $order_id = $model->order_id;
            foreach ($cart as $key=>$value){
                $body .= '<tr><td style="text-align: center;">'.$i++.'</td>';
                $body .= '<td>'.$value['prod_name'].'</td>';
                $body .= '<td style="text-align: right;">'.number_format($value['prod_price']).'</td>';
                $body .= '<td style="text-align: center;">'.$value['qty'].'</td>';
                $body .= '<td style="text-align: right;">'.number_format($value['qty']*$value['prod_price']).'</td></tr>';
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order_id;
                $orderDetail->pro_id = $key;
                $orderDetail->pro_price = $value['prod_price'];
                $orderDetail->pro_qty = $value['qty'];
                $orderDetail->status = 1;
                $orderDetail->updated_at = time();
                $orderDetail->created_at = time();
                $orderDetail->save();
            }
            $emailSend = array($infoPost['User']['email'],$infoPost['Order']['email_ship']);
            $email = new sendMail();
            $email->sendEmail($emailSend, 'Th??ng tin ?????t h??ng', $body );

            $cart=Yii::$app->session->destroy();
            return $this->render('thanh-cong',['cart'=>$cart,'model' => $model]);


        }



        return $this->render('checkout',['cart'=>$cart,'province'=>$province,'model' => $model, 'deliver' => $deliver, 'payment'=>$payment, 'user'=>$user,'dictrict'=>$dictrict,'ward'=>$ward ]);
    }



}

?>