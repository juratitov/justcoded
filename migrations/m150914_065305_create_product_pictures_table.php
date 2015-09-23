<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m150914_065305_create_product_pictures_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
     $this->createTable('product_pictures', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(150)',
            'file' => Schema::TYPE_STRING .'(50)',
            'product_id' => Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_pp_product_id', 'product_pictures', 'product_id', 'products', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_pp_product_id', 'product_pictures');

        $this->dropTable('product_pictures');
    }

}
