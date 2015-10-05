<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product_pictures".
 *
 * @property integer $id
 * @property string $title
 * @property string $file
 * @property integer $product_id
 *
 * @property Products $product
 */
class ProductPictures extends \yii\db\ActiveRecord
{

    const FILE_PATH = 'uploads/';
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['file'], 'string', 'max' => 50],
            [['imageFile'], 'file', 'skipOnEmpty' => ($this->scenario == self::SCENARIO_CREATE ? false : true), 'extensions' => 'png, jpg', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE]],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * 
     * @return boolean
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(self::FILE_PATH . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'file' => 'File',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public function fields()
    {
        return ['title', 'file' => function($model) {
                return self::FILE_PATH . $model->file;
            }];
    }

    /**
     * 
     * @return type
     */
    public function getImageFile()
    {
        return isset($this->file) ? self::FILE_PATH . $this->file : null;
    }

    /**
     * 
     * @return boolean
     */
    public function deleteImage()
    {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->file = null;

        return true;
    }

}
