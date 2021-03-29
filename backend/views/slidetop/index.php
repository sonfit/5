<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Homepages */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homepages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homepages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm Slider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--        --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php
//echo '<pre>';
//print_r($dataArr);
//echo '</pre>';
//die();
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => array (
            ['class' => 'yii\grid\SerialColumn'],
            'slide_image',
            'home_value:ntext',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        )
    ]);


 ?>



</div>
