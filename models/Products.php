<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $cost
 *
 * @property ProductPictures[] $productPictures
 * @property ProductsCategories[] $productsCategories
 * @property Categories[] $categories
 * @property Sales[] $sales
 * @property ProductsSales[] $productsSales
 */
class Products extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cost'], 'required'],
            [['description'], 'string'],
            [['cost'], 'number'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'cost' => 'Cost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPictures()
    {
        return $this->hasMany(ProductPictures::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsCategories()
    {
        return $this->hasMany(ProductsCategories::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsSales()
    {
        return $this->hasMany(ProductsSales::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id'])->viaTable(ProductsCategories::tableName(), ['product_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['id' => 'sale_id'])->viaTable(ProductsSales::tableName(), ['product_id' => 'id']);
    }

}
