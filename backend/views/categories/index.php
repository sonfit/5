<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Categories;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Categories */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="pull-right">
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
        ['class' => 'yii\grid\checkboxColumn'],

            [
                    'attribute' =>'cate_id',
                    'headerOptions' => [
                        'style' => 'width:10%'
                ],
                    'contentOptions'=>[
                    'style' => 'width:10%'
                ]
            ],
            'cate_name',
//            'cate_slug',
            [
                'attribute' => 'cate_parent',
                'content' => function($parent){
                    if($parent->cate_parent == 0){
                        return '<span>Root</span>';
                    }else{
                        $child = Categories::find()->where(['cate_id'=>$parent->cate_parent])->one();
                        if($child){
                            return  $child->cate_name;
                        }else{
                            return 'N/A';
                        }
                    }
                }
            ],
            'cate_desc',
            [
                'attribute' => 'cate_status',
                'headerOptions' => [
                    'style' => 'width:15%',
                ],
                'contentOptions'=>[
                    'style' => 'width:15%; text-align:center'
                ],
                'content' => function($model){
                    if($model->cate_status == 0){
                        return '<span  class="label label-danger"> Ẩn </span>';
                    }else{
                        return '<span class="label label-success"> Hiện </span>';
                    }
                }
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
