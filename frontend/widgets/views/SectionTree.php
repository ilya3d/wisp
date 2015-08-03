<ul class="list-group">

    <?= \yii\helpers\Html::tag('li', $tree['title'], ['class'=>'list-group-item']) ?>
    <? foreach($tree['child'] as $node): ?>
        <?= \yii\helpers\Html::tag('li', ' - ' . $node['title'], ['class'=>'list-group-item']) ?>
        <? foreach($node['child'] as $node2): ?>
            <?= \yii\helpers\Html::tag('li', ' -- ' . $node2['title'], ['class'=>'list-group-item']) ?>
        <? endforeach ?>
    <? endforeach ?>

</ul>