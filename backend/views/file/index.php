<?php
$this->title = ' Quản lý hình ảnh';
$baseUrl = str_replace('/backend/web','',Yii::$app->urlManager->baseUrl)
?>
<div class="file-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $this->title ;?></h3>
        </div>
        <div class="panel-body">
<!--            --><?php //echo $baseUrl;?>
            <iframe src="<?php echo $baseUrl;?>/file/dialog.php" frameborder="0"></iframe>
        </div>
    </div>
</div>
