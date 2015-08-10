<?php

namespace frontend\core;

use app\models\Section;


class Page {

    protected $url = [];// path

    protected $tree = null;

    protected $section = 0;


    public function __construct() {

        $this->tree = TreeSection::build();

        $url = \Yii::$app->getRequest()->getQueryParams();
        $this->url = isSet($url['url']) ? explode( '/', $url['url'] ) : [];

        $this->section = $this->findSection();

    }


    protected function findSection() { // todo to TreeSection

        /** @var SectionNode $node */
        $node = &$this->tree;

        foreach ( $this->url as $alias ) {

            $flag = false;

            foreach ( $node->getChild() as $curNode )
                if ( $curNode->alias == $alias ) {
                    $flag = true;
                    $node = &$curNode;
                    break;
                }

            if ( !$flag )
                break;
        }

        return $node->id;
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