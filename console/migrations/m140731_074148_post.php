<?php

use yii\db\Schema;
use yii\db\Migration;

class m140731_074148_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%post}}',
            [
                'id' => Schema::TYPE_PK,
                'title' => Schema::TYPE_STRING . '(128) NOT NULL ',
                'content' => Schema::TYPE_TEXT . ' NOT NULL',
                'tags' => Schema::TYPE_TEXT,
                'status' => Schema::TYPE_INTEGER,
                'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            ],
            $tableOptions
        );

        $user = \common\models\User::findOne(['id' => 1]);

        if ($user) {
            $post = new \common\models\Post();

            $post->author_id = $user->id;

            $post->title = 'Welcome!';
            $post->content = 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to
            build a complete real-world application. Complete source code may be found in the Yii
            releases. Feel free to try this system by writing new posts and posting comments.';
            $post->tags = 'yii2, rest';
            $post->status = 1;
            return $post->insert();
        }

        return false;

    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
