<?
use yii\helpers\Html;
/* @var \frontend\core\SectionNode $tree */
?>
<table class="table table-hover table-condensed">
    <? foreach( $tree->getChild() as $node ):?>
        <tr>
            <td><?= $node->title ?></td>
            <td class="text-right">
                <a href="/admin/section/view/?id=<?= $node->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                <a href="/admin/section/edit/?id=<?= $node->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="/admin/section/delete/?id=<?= $node->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        <? foreach( $node->getChild() as $node2 ):?>
            <tr>
                <td> <span class="glyphicon glyphicon-minus"></span> <?= $node2->title ?></td>
                <td class="text-right">
                    <a href="/admin/section/view/?id=<?= $node2->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                    <a href="/admin/section/edit/?id=<?= $node2->id ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="/admin/section/delete/?id=<?= $node2->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
            <? foreach( $node2->getChild() as $node3 ):?>
                <tr>
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