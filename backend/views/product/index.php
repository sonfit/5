<?php

use backend\models\Categories;
use backend\models\Brand;
use backend\models\Product;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\checkboxColumn'],

            [
                'attribute' =>'prod_id',
                'headerOptions' => [
                    'style' => 'width:10%'
                ],
                'contentOptions'=>[
                    'style' => 'width:10%; text-align:center'
                ]
            ],
            [
                'attribute' => 'cate_id',
                'content' => function($cate) {
                    $prod_name = Categories::find()->where(['cate_id' => $cate->cate_id])->one();
                    return $prod_name->cate_name;
                }
            ],
            [
                'attribute' => 'brand_id',
                'content' => function($brand) {
                    $brand_name = Brand::find()->where(['brand_id' => $brand->brand_id])->one();
                    return $brand_name->brand_name;
                }
            ],
            'prod_name',
//            'prod_status',
            [
                'attribute' => 'prod_status',
                'headerOptions' => [
                    'style' => 'width:15%',
                ],
                'contentOptions'=>[
                    'style' => 'width:15%; text-align:center'
                ],
                'content' => function($model){
                    if($model->prod_status == 0){
                        return '<span  class="label label-danger"> Ẩn </span>';
                    }else{
                        return '<span class="label label-success"> Hiện </span>';
                    }
                }
            ],
//            'prod_image',
            //'prod_content:ntext',
            //'prod_desc',
            //'prod_price',
            //'prod_qty',
            //'prod_status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>




</div>
