<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Homepages */

$this->title = 'Create Homepages';
$this->params['breadcrumbs'][] = ['label' => 'Homepages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homepages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
