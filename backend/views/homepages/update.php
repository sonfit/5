<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Homepages */

$this->title = 'Update Homepages: ' . $model->home_id;
$this->params['breadcrumbs'][] = ['label' => 'Homepages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->home_id, 'url' => ['view', 'id' => $model->home_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="homepages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
