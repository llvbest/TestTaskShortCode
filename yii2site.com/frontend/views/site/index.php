<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <p><a class="btn btn-lg btn-success" href="<?=Url::to(['/data']);?>">View all data</a></p>
    </div>
</div>
<!-- Begin widget -->
<form id="wbd-widget-form" class="wbd-widget__form">
    <input type="hidden" id="page_id" name="page_id" value="111-qwerty-222">
    Name <input type="text" id="name" name="name" value="">
    Email <input type="text" id="email" name="email" value="">
    <input type="submit" id="wbd-widget-update" class="wbd-widget__form-submit" value="Обновить">
</form>
<script src="http://yii2.com/js/widgets.js" charset="UTF-8"></script>
<!-- end widget -->