<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tinhthanhpho */

$this->title = 'Create Tinhthanhpho';
$this->params['breadcrumbs'][] = ['label' => 'Tinhthanhphos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tinhthanhpho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
