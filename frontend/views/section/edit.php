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
    <div class="col-md-4"><?= frontend\widgets\admin\SectionTree::widget([]) ?></div>
    <div class="col-md-8">
        <?php $showForm = ActiveForm::begin([
            'id' => 'section-form',
            'method'=>'POST',
            'action'=>'/admin/section/edit/',
            //'options' => ['data-pjax' => true,'enctype' => 'multipart/form-data' ],
        ]); ?>
        <div class="form-group text-right">
            <?= Html::a('back', '/admin/section/', ['class'=>'btn btn-warning']) ?>
            <?= Html::submitButton('save',['class'=>'btn btn-success']) ?>
        </div>

            <?= $showForm->field($form,'id')->hiddenInput()->label('') ?>
            <?= $showForm->field($form,'title')->label('Title') ?>
            <?= $showForm->field($form,'alias')->label('Alias') ?>
            <?= $showForm->field($form,'parent')->label('Parent')->dropDownList( Section::getList() ) ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>