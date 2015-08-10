<?
/**
 * @var $this yii\web\View
 * @var $form app\models\SectionForm
 */
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
        <div class="col-1">
            <?= Html::submitButton('save',['class'=>'btn btn-success']) ?>
            <?= Html::a('back', '/admin/section/', ['class'=>'btn btn-warning']) ?>
        </div>
        <div class="col-l">
            <?= $showForm->field($form,'title')->label('Title') ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>