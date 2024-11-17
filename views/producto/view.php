<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Producto $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="producto-view">
    <h1><?= Html::encode($model->nombre_producto) ?></h1>
    <!-- Mostrar la imagen del producto desde la carpeta multimedia -->
    <img src="<?= Yii::$app->request->baseUrl . '/multimedia/' . $model->image ?>" alt="<?= Html::encode($model->nombre_producto) ?>" class="product-image">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre_producto',
            'descripcion',
            'precio',
            'stock',
        ],
    ]) ?>

</div>
