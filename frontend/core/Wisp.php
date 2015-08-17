<?php

namespace frontend\core;

/**
 * Base class
 * Class Wisp
 * @package frontend\core
 */
class Wisp
{

    public static function get() {

        return new self();
    }


    public static function getModuleList() {
        return ['content', 'news'];
    }


    public static function showModule( $module ) {

        return $module;
    }



}