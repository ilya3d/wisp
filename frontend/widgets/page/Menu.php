<?php

namespace frontend\widgets\page;

use app\models\TreeSection;


class Menu extends \yii\bootstrap\Widget {

    protected $tree = [];

    public function init() {
        $this->tree = TreeSection::build();
    }

    public function run() {
        return $this->render('Menu', ['tree' => $this->tree]);
    }

}