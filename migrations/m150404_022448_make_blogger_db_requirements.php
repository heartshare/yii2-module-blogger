<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_022448_make_blogger_db_requirements extends Migration
{
    // public function up()
    // {

    // }

    // public function down()
    // {
    //     echo "m150404_022448_make_blogger_db_requirements cannot be reverted.\n";

    //     return false;
    // }
    
    
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%blogger_posts}}', [
            'post_id' => 'pk',
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'title' => Schema::TYPE_TEXT . ' NOT NULL',
            'excerpt' => Schema::TYPE_TEXT . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'access_key' => Schema::TYPE_STRING . ' NOT NULL DEFAULT ""',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updater_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->insert('{{%blogger_posts}}', [
            'type' => 'blog',
            'title' => 'Sample blog post',
            'excerpt' => 'A very short sample content.',
            'content' => 'A very short sample content. Well at least it\'s not weird.',
        ]);

        $this->createTable('{{%blogger_postmeta}}', [
            'meta_id' => 'pk',
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'key' => Schema::TYPE_STRING . ' NOT NULL',
            'value' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updater_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%blogger_settings}}', [
            'id' => 'pk',
            'key' => Schema::TYPE_STRING . ' NOT NULL',
            'value' => Schema::TYPE_TEXT . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updater_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->insert('{{%blogger_settings}}', [
            'key' => 'rbac',
            'value' => '0',
        ]);
    }
    
    public function safeDown()
    {
        echo "m150404_022448_make_blogger_db_requirements cannot be reverted for now.\n";

        return false;
    }
    
}
