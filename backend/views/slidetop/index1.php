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

<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-striped table-bordered"><thead>
        <tr>
            <th>Image</th>
            <th>Tiêu đề</th>
            <th>Link</th>
            <th>Text</th>
            <th>DESC</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($dataArr as $key=>$value){
            foreach ($value as $k=>$v){
        ?>
            <tr>
                <td>
                    <img src="<?=$v['slide_image'] ?>">
                </td>
                <td><?= $v['slide_title'] ?></td>
                <td><?= $v['slide_button_link'] ?></td>
                <td><?= $v['slide_button_text'] ?></td>
                <td><?= $v['slide_des'] ?></td>
                <td>
                    <a href="/5/backend/web/index.php?r=product%2Fview&amp;id=1" title="View" aria-label="View" data-pjax="0">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                    <a href="/5/backend/web/index.php?r=product%2Fupdate&amp;id=1" title="Update" aria-label="Update" data-pjax="0">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="/5/backend/web/index.php?r=product%2Fdelete&amp;id=1" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php }}?>
        </tbody></table>



</div>
