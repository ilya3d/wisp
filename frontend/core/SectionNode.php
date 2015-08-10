<?php

namespace frontend\core;


class SectionNode {

    public $id = null;
    public $alias = '';
    public $title = '';

    protected $parent = null;

    /** @var self[] Children sections */
    protected $child = [];


    public function __construct( $parent, $id, $alias, $title = '' ) {
        $this->parent = $parent;
        $this->id = $id;
        $this->alias = $alias;
        $this->title = $title;
    }


    public static function init( $id, $alias, $title ) {
        return new self( null, $id, $alias, $title );
    }


    public function addChild( $id, $alias, $title ) {

        if ( !$this->id )
            return false;

        $node = new self( $this->id, $id, $alias, $title );

        $this->child[] = $node;

        return $node;
    }


    /**
     * @return SectionNode[]
     */
    public function getChild() {
        return $this->child;
    }


    public function parent() {
        return $this->parent();
    }



}