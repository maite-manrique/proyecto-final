<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Producto $model */

$this->title = 'Create Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php var_dump($model); ?>
<?php
$producto = new Producto();  // Crea el objeto del modelo
$form = ActiveForm::begin();
echo $form->field($producto, 'name');  // Nombre del producto
echo $form->field($producto, 'price');  // Precio
echo $form->field($producto, 'description');  // Descripción
echo $form->field($producto, 'imageFile')->fileInput();  // Campo para subir imagen
ActiveForm::end();
>

<div class="producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="producto-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'] // Necesario para la carga de archivos
    ]); ?>

    <!-- Campo para el nombre del producto -->
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- Campo para la descripción del producto -->
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <!-- Campo para el precio del producto -->
    <?= $form->field($model, 'price')->textInput() ?>

    <!-- Campo para el stock del producto -->
    <?= $form->field($model, 'stock')->textInput() ?>

    <!-- Campo para cargar la imagen del producto -->
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>

