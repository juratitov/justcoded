<?php

namespace app\modules\api\controllers;

use yii\web\Controller;

class ProductController extends Controller
{

    public $modelClass = 'app\models\Product';

    public function actionGetProductDetails()
    {
        $data = [];

        $products = \app\models\Products::find()->all();

        foreach ($products as $product) {
            $prodData['product'] = $product;
            $categories = $product->categories;

            foreach ($categories as $category) {
                $prodData['categories'][] = $category;
            }

            $productPictures = $product->productPictures;

            foreach ($productPictures as $productPicture) {
                $prodData['pictures'][] = $productPicture;
            }

            $sales = $product->sales;

            foreach ($sales as $sale) {
                $prodData['sales'][] = $sale;
            }

            $data[] = $prodData;
        }
        
        return \yii\helpers\Json::encode($data);
    }

}
