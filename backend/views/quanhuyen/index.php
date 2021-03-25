<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Quanhuyen */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quanhuyens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quanhuyen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quanhuyen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'maqh',
            'name',
            'type',
            'matp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
