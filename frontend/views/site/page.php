<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $section \app\models\Section */
$this->title = 'page';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $section->title ?></h1>
<?= frontend\widgets\page\Menu::widget([]) ?>
<?= frontend\widgets\page\Content::widget([]) ?>