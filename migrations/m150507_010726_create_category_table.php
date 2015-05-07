<?php

use yii\db\Schema;
use yii\db\Migration;

class m150507_010726_create_category_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%blogger_terms}}', [
            'term_id' => 'pk',
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'parent_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'name' => Schema::TYPE_TEXT . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updater_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->insert('{{%blogger_terms}}', [
            'type' => 'category',
            'name' => 'Uncategorized',
        ]);

        $this->createTable('{{%blogger_term_assignments}}', [
            'assignment_id' => 'pk',
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'term_id' => Schema::TYPE_STRING . ' NOT NULL',
            'post_id' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updater_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }
    
    public function safeDown()
    {
        echo "m150404_022448_make_blogger_db_requirements cannot be reverted for now.\n";

        return false;
    }
}
