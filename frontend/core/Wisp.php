<?php

namespace frontend\core;

use Yii;


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


    public static function showModule( $name ) {

        $module = Yii::$app->getModule( 'content' );

        return $module->runAction('admin/index');
    }



}