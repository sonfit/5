<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Xaphuongthitran */

$this->title = 'Create Xaphuongthitran';
$this->params['breadcrumbs'][] = ['label' => 'Xaphuongthitrans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xaphuongthitran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
