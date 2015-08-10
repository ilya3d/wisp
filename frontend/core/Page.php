<?php

namespace frontend\core;

use app\models\TreeSection;


class Page {

    protected $url = [];

    protected $tree = null;

    protected $section = 0;


    public function __construct() {

        $this->tree = TreeSection::build();

        $url = \Yii::$app->getRequest()->getQueryParams();
        $this->url = isSet($url['url']) ? explode( '/', $url['url'] ) : [];

        $this->section = TreeSection::findSection( $this->url );

    }


    public function getSection() {
        return $this->section;
    }

}