<?php

use yii\db\Schema;
use yii\db\Migration;

class m150504_152751_add_post_slug extends Migration
{
    public function up()
    {
        $this->addColumn('{{%blogger_posts}}', 'slug', Schema::TYPE_STRING . ' NOT NULL AFTER title' );
    }

    public function down()
    {
        echo "m150504_152751_add_post_slug cannot be reverted.\n";

        return false;
    }

}
