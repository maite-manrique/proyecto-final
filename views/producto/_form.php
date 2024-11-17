<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // Importar la librería Select2

/** @var yii\web\View $this */
/** @var app\models\Producto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'] // Importante para subir archivos
    ]); ?>

    <!-- Campo de nombre del producto -->
    <?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>

    <!-- Campo de descripción -->
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <!-- Campo de precio -->
    <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>

    <!-- Campo de stock -->
    <?= $form->field($model, 'stock')->textInput() ?>

    <!-- Uso de Select2 -->
    <?= $form->field($model, 'categoria')->widget(Select2::classname(), [
        'data' => [
            1 => 'Electrónica',
            2 => 'Ropa',
            3 => 'Alimentos',
        ],
        'options' => ['placeholder' => 'Selecciona una categoría...'],
        'pluginOptions' => ['allowClear' => true],
    ]); ?>

    <!-- Campo de carga de archivo para la imagen -->
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
