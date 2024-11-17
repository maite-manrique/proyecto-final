<?php

use app\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Categoria $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
        <?php if (!empty($categorias)): ?>
        <?php foreach ($categorias as $categoria): ?>
            <div class="categoria-item">
                <?= Html::a(Html::encode($categoria->nombre), ['producto/por-categoria', 'categoriaId' => $categoria->id]) ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay categorías disponibles.</p>
    <?php endif; ?>


    <?php foreach ($categorias as $categoria): ?>
        <div class="categoria-item">
            <?= Html::a(Html::encode($categoria->nombre), ['producto/por-categoria', 'categoriaId' => $categoria->id]) ?>
        </div>
    <?php endforeach; ?>


</div>
