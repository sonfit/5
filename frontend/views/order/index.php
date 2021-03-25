<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

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

//            [
//                'attribute' => 'user_id',
//                'content' => function($user) {
//                    $user_name = User::find()->where(['id' => $user->user_id])->one();
//
//                    return $user_name->username;
//                }
//
//            ],
            'user_ship',
            'email_ship:email',
            'phone_ship',
            //'add_ship',
            //'province_ship',
            //'dictrict_ship',
            //'ward_ship',
            //'resquest',
            //'total',
            //'payment_id',
            //'deliver_id',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
