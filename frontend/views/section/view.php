<?
/**
 * @var $this yii\web\View
 */
use \app\models\Section;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\core\Wisp;

?>
<h3><?= $section->title ?></h3>
<div class="site-about">
    <div class="col-md-4"><?= frontend\widgets\admin\SectionList::widget([]) ?></div>
    <div class="col-md-8">

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#modules" aria-controls="modules" role="tab" data-toggle="tab">Modules</a></li>
            <li role="presentation"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">Design</a></li>
            <? foreach(Wisp::getModuleList() as $module):?>
                <li role="presentation"><a href="#<?= $module ?>" aria-controls="<?= $module ?>" role="tab" data-toggle="tab"><?= $module ?></a></li>
            <? endforeach;?>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="modules"><?= Wisp::showModule('ModuleForSection') ?></div>
            <div role="tabpanel" class="tab-pane" id="design"><?= Wisp::showModule('LayoutForSection') ?></div>
            <? foreach(Wisp::getModuleList() as $module):?>
                <div role="tabpanel" class="tab-pane" id="<?= $module ?>"><?= Wisp::showModule($module) ?></div>
            <? endforeach;?>
        </div>

    </div>
</div>