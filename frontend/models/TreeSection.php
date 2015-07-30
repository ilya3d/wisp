<?php

namespace app\models;


class TreeSection {


    public static function build() {

        $section = Section::getByAlias( 'root' );

        $tree = [
            'id' => $section->id,
            'alias' => $section->alias,
            'title' => $section->title,
            'child' => self::getNote( $section )
        ];


        return $tree;
    }


    private static function getNote( $parent ) {

        if ( !$parent )
            return [];

        $note = [];
        $sections = Section::findAll(['parent' => $parent->id]);

        foreach ( $sections as $section )
            $note[] = [
                'id' => $section->id,
                'alias' => $section->alias,
                'title' => $section->title,
                'child' => self::getNote( $section )
            ];


        return $note;
    }


    public static function findSection( $url ) {

        $tree = self::build();

        $node = &$tree;

        foreach ( $url as $alias ) {

            $flag = false;

            foreach ( $node['child'] as $key => $cur )
                if ( $cur['alias'] == $alias ) {
                    $flag = true;
                    $node = &$node['child'][$key];
                    break;
                }

            if ( !$flag )
                break;
        }

        return $node['id'];
    }

}