<?php

use yii\db\Migration;
use \yii\db\mssql\Schema;

class m150928_055930_add_tree_to_category extends Migration
{
    public function up()
    {
        $this->addColumn('categories', 'tree', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('categories', 'tree');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
