<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Admin';
?>
<div class="site-about">
    <div class="col-md-4"><?= frontend\widgets\admin\SectionTree::widget([]) ?></div>
    <div class="col-md-8">
        <div>
            <?= Html::a('new', '/admin/section/edit/', ['class'=>'btn btn-success']) ?>
        </div>
    </div>
</div>
