<?
use yii\helpers\Html;
/* @var \frontend\core\SectionNode $tree */
?>
<div class="dd">

<?
    function getNode( $node ) {

        $out = '';
        foreach( $node->getChild() as $child ) {
            $out .= getNode( $child );
        }
        $out = Html::tag( 'div', $node->title, ['class'=>"dd-handle"]) .
            Html::tag( 'ol', $out, ['class'=>'dd-list']);

        return Html::tag( 'li', $out, ['class'=>"dd-item", 'data-id'=>$node->id ] );
    }

    echo Html::tag( 'ol', getNode( $tree ), ['class'=>'dd-list']);
?>
</div>
<?php
$js = <<<JS
    $(document).ready(function(){
        $('.dd').nestable();//.on('change', updateOutput)
    });
JS;
$this->registerJs($js);
?>