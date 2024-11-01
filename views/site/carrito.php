<?php foreach ($items as $item): ?>
    <p>
        Producto: <?= $item->product->name ?> |
        Cantidad: <?= $item->quantity ?> |
        Precio: <?= $item->product->price ?>
    </p>
<?php endforeach; ?>
<?php
use yii\helpers\Html;

// Inicializa variables para cálculos
$subtotal = 0;
$totalDescuento = 0;
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Carrito de Compras</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <?php
                        // Calcula el subtotal del producto actual
                        $itemSubtotal = $item['precio'] * $item['cantidad'];
                        $subtotal += $itemSubtotal;
                    ?>
                    <tr>
                        <td><?= Html::encode($item['nombre']) ?></td>
                        <td><?= Yii::$app->formatter->asCurrency($item['precio']) ?></td>
                        <td><?= Html::encode($item['cantidad']) ?></td>
                        <td><?= Yii::$app->formatter->asCurrency($itemSubtotal) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
    $totalDescuento = $subtotal * ($descuento / 100);
    $total = $subtotal - $totalDescuento;
    ?>

    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Resumen del Pedido</h4>
            <p><strong>Subtotal:</strong> <?= Yii::$app->formatter->asCurrency($subtotal) ?></p>
            <p><strong>Descuento:</strong> <?= $descuento ?>%</p>
            <p><strong>Total Descuento:</strong> <?= Yii::$app->formatter->asCurrency($totalDescuento) ?></p>
            <p><strong>Total a Pagar:</strong> <?= Yii::$app->formatter->asCurrency($total) ?></p>
        </div>
        <div class="card-footer text-end">
            <?= Html::a('Continuar con la Compra', ['checkout/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Vaciar Carrito', ['cart/clear'], ['class' => 'btn btn-danger ms-2']) ?>
        </div>
    </div>
</div>
