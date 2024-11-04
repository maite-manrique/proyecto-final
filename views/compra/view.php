<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $cartItems */
/** @var float $totalPrice */
/** @var array $paymentMethods */ // Cambiar de string a array

$this->title = 'Mi Carrito';
\yii\web\YiiAsset::register($this);
?>
<div class="compra-view">
    <br><br>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <!-- Información de productos -->
        <div class="col-8">
            <div class="card carritofond">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartItems as $item): ?>
                            <tr>
                                <td>
                                    <?= Html::img($item['image'], ['alt' => Html::encode($item['name']), 'class' => 'img-thumbnail', 'style' => 'max-width: 100px;']) ?>
                                </td>
                                <td><?= Html::encode($item['name']) ?></td>
                                <td>$<?= number_format($item['price'], 2) ?></td>
                                <td><?= Html::encode($item['quantity']) ?></td>
                                <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Información final de compra -->
        <div class="col-4 fondcarrito">
            <h3>Total: $<?= number_format($totalPrice, 2) ?></h3>
            <h4>Métodos de Pago</h4>
            <ul>
                <?php foreach ($paymentMethods as $method): ?>
                    <li><?= Html::encode($method) ?></li>
                <?php endforeach; ?>
            </ul>
            <div>
                <?= Html::a('Finalizar Compra', ['compra/checkout'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

