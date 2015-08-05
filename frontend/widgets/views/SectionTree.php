<div class="dd">
    <ol class="dd-list">
        <li class="dd-item" data-id="<?= $tree['id'] ?>">
            <div class="dd-handle"><?= $tree['title'] ?></div>
            <ol class="dd-list">
                <? foreach($tree['child'] as $node): ?>
                <li class="dd-item" data-id="<?= $tree['id'] ?>">
                    <div class="dd-handle"><?= $node['title'] ?></div>
                    <ol class="dd-list">
                        <? foreach($node['child'] as $node2): ?>
                            <li class="dd-item" data-id="<?= $tree['id'] ?>">
                                <div class="dd-handle"><?= $node2['title'] ?></div>
                            </li>
                        <? endforeach ?>
                    </ol>
                </li>
                <? endforeach ?>
            </ol>
        </li>
    </ol>
</div>
<?php
$js = <<<JS
    $(document).ready(function(){
        $('.dd').nestable();//.on('change', updateOutput)
    });
JS;
$this->registerJs($js);
?>