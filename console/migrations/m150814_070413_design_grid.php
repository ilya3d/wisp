<?php

use yii\db\Schema;
use yii\db\Migration;

class m150814_070413_design_grid extends Migration
{

    public function safeUp()
    {

        $this->createTable( 'design_grid', [
            'id' => Schema::TYPE_PK,
            'section' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'module' => Schema::TYPE_STRING . '(255) NOT NULL DEFAULT \'\'',
            'layout' => Schema::TYPE_STRING . '(255) NOT NULL DEFAULT \'\'',
            'position' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable( 'design_grid' );
    }

}
