<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Producto[] $productos */
/** @var app\models\Categoria $categoria */

$this->title = 'Productos en la categoría: ' . $categoria->nombre;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="producto-por-categoria">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Mostrar productos con imágenes y descripciones -->
    <div class="container mt-4">
        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="col-md-3"> <!-- Cambia esto para ajustar la cantidad de productos por fila -->
                    <div class="card mb-4">
                        <!-- Imagen del producto -->
                        <?= Html::img('@web/multimedia/' . $producto->image, ['class' => 'card-img-top', 'alt' => $producto->nombre_producto]) ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($producto->nombre_producto) ?></h5>
                            <p class="card-text"><?= Html::encode($producto->descripcion) ?></p>
                            <p class="card-text"><strong>Precio: $<?= Html::encode($producto->precio) ?></strong></p>

                            <!-- Botón para ver más detalles del producto -->
                            <?= Html::a('Ver detalles', ['producto/view', 'id' => $producto->id], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
