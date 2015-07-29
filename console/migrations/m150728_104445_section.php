<?php

use yii\db\Schema;
use yii\db\Migration;

class m150728_104445_section extends Migration
{
    public function safeUp()
    {

        $this->createTable( 'section', [
            'id' => Schema::TYPE_PK,
            'alias' => Schema::TYPE_STRING . '(255) NOT NULL DEFAULT \'\'',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL DEFAULT \'\'',
            'parent' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'position' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'visible' => Schema::TYPE_BOOLEAN,
            'type' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'cache' => Schema::TYPE_TEXT . ' NOT NULL DEFAULT \'\''
        ]);

    }

    public function safeDown()
    {
        $this->dropTable( 'section' );
    }
}
