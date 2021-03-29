<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Banner */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Banner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'banner_id',
            [

                'attribute' => 'banner_image',

                'format' => 'html',

                'label' => 'Hình Ảnh',

                'value' => function ($data) {

                    return Html::img('/5/uploads/banner/' . $data['banner_image'],

                        ['width' => '60px']);

                },

            ],
            'banner_title',
            'banner_des',
            [
                'attribute' => 'banner_status',
                'content' => function($model){
                    if($model->banner_status == 0){
                        return ' Top ';
                    }if($model->banner_status == 1 ){
                        return ' Mid';
                    }
                    else{
                        return 'Bot';
                    }
                }
            ],
            'banner_button_link',
            'banner_button_text',
            //'banner_status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
