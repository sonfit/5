<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Categories */

$this->title = 'Update Categories: ' . $model->cate_id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cate_id, 'url' => ['view', 'id' => $model->cate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
