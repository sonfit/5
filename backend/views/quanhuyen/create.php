<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quanhuyen */

$this->title = 'Create Quanhuyen';
$this->params['breadcrumbs'][] = ['label' => 'Quanhuyens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quanhuyen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
