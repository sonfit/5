<?php

use backend\models\Categories;
use yii\helpers\Html;
use yii\grid\GridView;

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
            ['class' => 'yii\grid\SerialColumn'],

            'prod_id',
            [
                'attribute' => 'cate_id',
                'content' => function($cate) {
                    $prod_name = Categories::find()->where(['cate_id' => $cate->cate_id])->one();

                    return $prod_name->cate_name;
                }

            ],
            'prod_name',
            'prod_slug',
            'prod_image',
            //'prod_content:ntext',
            //'prod_desc',
            //'prod_price',
            //'prod_qty',
            //'prod_status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
