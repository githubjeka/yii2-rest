<?php

use yii\db\Schema;
use yii\db\Migration;

class m140724_112641_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user}}',
            [
                'id' => Schema::TYPE_PK,
                'username' => Schema::TYPE_STRING . ' NOT NULL ',
                'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
                'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
                'password_reset_token' => Schema::TYPE_STRING,
                'email' => Schema::TYPE_STRING . ' NOT NULL',
                'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            ],
            $tableOptions
        );

        $user = new \common\models\User();
        $user->username = 'demo';
        $user->email = 'demo@mail.net';
        $user->generateAuthKey();
        $user->setPassword('demo');
        return $user->insert();
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
