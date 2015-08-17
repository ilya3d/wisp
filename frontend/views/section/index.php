<?php
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var \frontend\core\SectionNode $tree
 */

$this->title = 'Admin';
?>
<div class="site-about">
    <div class="col-md-4">
        <?= frontend\widgets\admin\SectionList::widget([]) ?>
        <?= frontend\widgets\admin\SectionTree::widget([]) ?>
    </div>
    <div class="col-md-8">
        <div class="form-group text-right">
            <?= Html::a('new', '/admin/section/edit/', ['class'=>'btn btn-success']) ?>
        </div>
        <div class="form-group">
        <table class="table table-hover table-condensed">
            <? foreach( $tree->getChild() as $node ):?>
                <tr>
                    <th scope="row"><?= $node->id ?></th>
                    <td><?= $node->title ?></td>
                    <td class="text-right">
                        <a href="/admin/section/view/?id=<?= $node->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                        <a href="/admin/section/edit/?id=<?= $node->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="/admin/section/delete/?id=<?= $node->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
                <? foreach( $node->getChild() as $node2 ):?>
                    <tr>
                        <th scope="row"><?= $node2->id ?></th>
                        <td> <span class="glyphicon glyphicon-minus"></span> <?= $node2->title ?></td>
                        <td class="text-right">
                            <a href="/admin/section/view/?id=<?= $node2->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                            <a href="/admin/section/edit/?id=<?= $node2->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="/admin/section/delete/?id=<?= $node2->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                    <? foreach( $node2->getChild() as $node3 ):?>
                        <tr>
                            <th scope="row"><?= $node3->id ?></th>
                            <td> <span class="glyphicon glyphicon-minus"></span> <span class="glyphicon glyphicon-minus"></span> <?= $node3->title ?></td>
                            <td class="text-right">
                                <a href="/admin/section/view/?id=<?= $node3->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                                <a href="/admin/section/edit/?id=<?= $node3->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="/admin/section/delete/?id=<?= $node3->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                    <? endforeach;?>
                <? endforeach;?>
            <? endforeach;?>
        </table>
        </div>
    </div>
</div>
