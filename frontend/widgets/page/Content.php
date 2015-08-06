<?php

namespace frontend\widgets\page;


class Content extends \yii\bootstrap\Widget {

    public function init() { }

    public function run() {
        return $this->render('Content', ['content' => 'hohoho'] );
    }

}