<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Brand */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Brand', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'brand_id',
            'brand_name',
            'brand_desc',
            [
                'attribute' => 'cate_status',
                'headerOptions' => [
                    'style' => 'width:15%',
                ],
                'contentOptions'=>[
                    'style' => 'width:15%; text-align:center'
                ],
                'content' => function($model){
                    if($model->brand_status == 0){
                        return '<span  class="label label-danger"> Ẩn </span>';
                    }else{
                        return '<span class="label label-success"> Hiện </span>';
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
