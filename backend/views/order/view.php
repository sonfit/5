<?php

$docso = new \frontend\components\Cart();
$detail = new \backend\models\OrderDetail();



use backend\models\OrderDetail;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $searchModel backend\models\search\OrderDetail */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            'order_id',
            'username',
            'user_ship',
            'email_ship:email',
            'phone_ship',
            [
                'attribute' => 'add',
                'label' => 'Địa chỉ',
            ],
            [
                'attribute' => 'resquest',
                'label' => 'Ghi chú',
            ],
            [
                'attribute' => 'total',
                'label' => 'Tổng tiền',
                'format'=>['decimal',0]
            ],
            [
                'attribute' => 'so',
                'label' => 'Bằng chữ',
                'value' => $docso->convert_number_to_words($model->total)

            ],
            [
                'attribute' => 'pay',
                'label' => 'Phương thức thanh toán',

            ],
            [
                'attribute' => 'delive',
                'label' => 'Phương thức Giao hàng',
            ],
            [
                'attribute' => 'status',
                'label' => 'Trạng thái',
                'value' => function ($model) {
                    if($model->status == 1){
                        return 'Đã đặt hàng';
                    }
                    if($model->status == 2){
                        return 'Đang giao hàng';
                    }
                    if($model->status == 3){
                        return ' Đã giao hàng';
                    }else{
                        return 'Đơn hàng bị hủy ';
                    }
                },
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Ngày đặt hàng',
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Chỉnh sửa cuối',
                'format' => ['date', 'php:d-m-Y']
            ],
        ],
    ]) ?>
    <div class="order-detail-index">

        <h4>Sản phẩm đã mua</h4>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'pro_id',
                    'content' => function($prod) {
                        $prod_name = \backend\models\Product::find()->where(['prod_id' => $prod->pro_id])->one();
                        return $prod_name->prod_name;
                    },
                    'label' => 'Tên sản phẩm',
                ],
                'pro_price',
                'pro_qty',
            ],
        ]); ?>


    </div>

</div>
