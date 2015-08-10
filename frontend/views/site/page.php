<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $page \frontend\core\Page */
/* @var $section \app\models\Section */
$this->title = 'page';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $page->getSection()->title ?></h1>
<?= frontend\widgets\page\Menu::widget(['page' => $page]) ?>
<?= frontend\widgets\page\Content::widget([]) ?>