<?php

use app\models\Producto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Mostrar productos con imágenes y descripciones -->
    <div class="container mt-4">
        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <!-- Imagen del producto -->
                        <img src="<?= Html::encode($producto->imagen) ?>" class="card-img-top" alt="<?= Html::encode($producto->nombre_producto) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($producto->nombre_producto) ?></h5>
                            <p class="card-text"><?= Html::encode($producto->descripcion) ?></p>
                            <a href="<?= Html::encode($producto->url) ?>" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- GridView para mostrar productos -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nombre_producto',
            'descripcion',
            'precio',
            'stock',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Producto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
