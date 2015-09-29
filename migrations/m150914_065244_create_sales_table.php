<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m150914_065244_create_sales_table extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('sales', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(100) NOT NULL',
            'discount' => Schema::TYPE_DECIMAL . '(12,4) DEFAULT 0.0',
            'quantity' => Schema::TYPE_INTEGER .  ' DEFAULT 0',
        ]);

        $this->createTable('products_sales', [
            'product_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'sale_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey('fk_ps_product_id', 'products_sales', 'product_id', 'products', 'id');
        $this->addForeignKey('fk_ps_sale_id', 'products_sales', 'sale_id', 'sales', 'id');

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_ps_product_id', 'products_sales');
        $this->dropForeignKey('fk_ps_sale_id', 'products_sales');

        $this->dropTable('products_sales');
        $this->dropTable('sales');
    }
}
