<?php

namespace frontend\widgets\page;

use frontend\core\Page;


class Menu extends \yii\bootstrap\Widget {

    /** @var Page */
    public $page = null;

    public function init() {
    }

    public function run() {
        return $this->render('Menu', ['path' => $this->page->getPath()]);
    }

}