<?php

namespace frontend\widgets\admin;

use frontend\core\TreeSection;


class SectionList extends \yii\bootstrap\Widget
{

    protected $tree = [];

    public function init() {
        $this->tree = TreeSection::build();
    }

    public function run() {
        return $this->render('SectionList', ['tree' => $this->tree]);
    }

}