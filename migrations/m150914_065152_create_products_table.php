<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m150914_065152_create_products_table extends Migration
{
    public function up()
    {
        $this->createTable('products', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(200) NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'cost' => Schema::TYPE_DECIMAL . '(12,2)  NOT NULL',
        ]);

    }

    public function down()
    {
        $this->dropTable('products');

        return false;
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
