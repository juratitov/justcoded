<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m150914_065231_create_categories_table extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(100) NOT NULL',
            'parent_id' => Schema::TYPE_INTEGER . ' DEFAULT 0',
        ]);

        $this->createTable('products_categories', [
            'product_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey('fk_pc_product_id', 'products_categories', 'product_id', 'products', 'id');
        $this->addForeignKey('fk_pc_category_id', 'products_categories', 'category_id', 'categories', 'id');

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_pc_product_id', 'products_categories');
        $this->dropForeignKey('fk_pc_category_id', 'products_categories');

        $this->dropTable('products_categories');
        $this->dropTable('categories');
    }

}
