<?php

namespace frontend\widgets;


use app\models\TreeSection;

class SectionTree extends \yii\bootstrap\Widget {

    protected $tree = [];

    public function init() {
        $this->tree = TreeSection::build();
    }

    public function run() {
        return $this->render('SectionTree', ['tree' => $this->tree]);
    }

}