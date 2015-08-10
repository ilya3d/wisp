<?php

namespace frontend\core;

use app\models\Section;
use app\models\TreeSection;


class Page {

    protected $url = [];// path

    protected $tree = null;

    protected $section = 0;


    public function __construct() {

        $this->tree = TreeSection::build();

        $url = \Yii::$app->getRequest()->getQueryParams();
        $this->url = isSet($url['url']) ? explode( '/', $url['url'] ) : [];

        $this->section = TreeSection::findSection( $this->url );

    }


    public function section() {
        return $this->section;
    }


    public function getSection() {
        return Section::findOne(['id' => $this->section()]);
    }


    public function getPath() {
        return $this->url;
    }

}