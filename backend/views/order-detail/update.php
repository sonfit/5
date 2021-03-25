<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderDetail */

$this->title = 'Update Order Detail: ' . $model->order_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_detail_id, 'url' => ['view', 'id' => $model->order_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
