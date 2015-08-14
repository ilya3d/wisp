<?
/**
 * @var $this yii\web\View
 * @var $form app\models\SectionForm
 */
use \app\models\Section;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="site-about">
    <div class="col-md-4"><h1><?= $section->title ?></h1><?= frontend\widgets\admin\SectionTree::widget([]) ?></div>
    <div class="col-md-8">

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">Design</a></li>
            <li role="presentation"><a href="#modules" aria-controls="modules" role="tab" data-toggle="tab">Modules</a></li>
            <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Content</a></li>
            <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">News</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="design">...</div>
            <div role="tabpanel" class="tab-pane" id="modules">...</div>
            <div role="tabpanel" class="tab-pane" id="content">...</div>
            <div role="tabpanel" class="tab-pane" id="news">...</div>
        </div>

    </div>
</div>