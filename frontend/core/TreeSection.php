<?php

namespace frontend\core;

use app\models\Section;


class TreeSection {


    public static function build() {

        $section = Section::getByAlias( 'root' );

        $root = SectionNode::init( $section->id, $section->alias, $section->title );

        self::setNodes( $root );

        return $root;
    }


    private static function setNodes( SectionNode $parent ) {

        if ( !$parent->id )
            return [];

        $sections = Section::findAll(['parent' => $parent->id]);

        foreach ( $sections as $section ) {
            $node = $parent->addChild( $section->id, $section->alias, $section->title );
            self::setNodes( $node );
        }

        return true;
    }

}