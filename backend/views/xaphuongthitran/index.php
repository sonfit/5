<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Xaphuongthitran */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xaphuongthitrans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xaphuongthitran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Xaphuongthitran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'xaid',
            'name',
            'type',
            'maqh',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
