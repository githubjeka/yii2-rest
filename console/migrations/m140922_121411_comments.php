<?php

use yii\db\Schema;
use yii\db\Migration;

class m140922_121411_comments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%comment}}',
            [
                'id' => Schema::TYPE_PK,
                'content' => Schema::TYPE_STRING . '(128) NOT NULL ',
                'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            ],
            $tableOptions
        );
    }

    public function down()
    {
        echo "m140922_121411_comments cannot be reverted.\n";

        return false;
    }
}
