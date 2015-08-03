<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="col-md-4"><?= frontend\widgets\SectionTree::widget([]) ?></div>
    <div class="col-md-8">section parameters</div>
</div>
