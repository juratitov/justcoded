<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $model app\models\ProductPictures */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-pictures-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?=
    $form->field($model, 'product_id')->dropdownList(
            Products::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => 'Select product']
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
