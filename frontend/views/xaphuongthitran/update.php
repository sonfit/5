<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Xaphuongthitran */

$this->title = 'Update Xaphuongthitran: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Xaphuongthitrans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->xaid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="xaphuongthitran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
