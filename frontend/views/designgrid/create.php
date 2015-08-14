<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DesignGrid */

$this->title = 'Create Design Grid';
$this->params['breadcrumbs'][] = ['label' => 'Design Grids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="design-grid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
