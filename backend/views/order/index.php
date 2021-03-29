<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Order */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'order_id',
            'username',
            'user_ship',
            'email_ship:email',
            'phone_ship',
            [
                'attribute' => 'total',
                'label' => 'Tổng tiền',
                'format'=>['decimal',0]
            ],
            [
                'attribute' => 'status',
                'headerOptions' => [
                    'style' => 'width:15%',
                ],
                'contentOptions'=>[
                    'style' => 'width:15%; text-align:center'
                ],
                'content' => function($model){
                    if($model->status == 1){
                        return '<span  class="label label-warning"> Đã đặt hàng </span>';
                    }
                    if($model->status == 2){
                        return '<span  class="label label-info"> Đang giao hàng </span>';
                    }
                    if($model->status == 3){
                        return '<span  class="label label-success"> Đã giao hàng </span>';
                    }else{
                        return '<span class="label label-danger"> Đơn hàng bị hủy </span>';
                    }
                },



            ],
            ['class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        $t = 'index.php?r=order%2Fview&id='.$model->order_id;
                        return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', ['value'=>Url::to($t), 'class' => 'btn  btn-xs  custom_button']);

                    },

                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                        ]);
                    }

                ],
            ]
        ],
    ]);

    Modal::begin([
        'header' => '<h4>Đơn hàng số</h4>',
//        'options' => 'sdas',
        'id' => 'modalView',
        'size' => 'modal-lg',
    ]);
    echo "<div id='modalContentView'></div>";
    Modal::end();

    ?>


</div>
