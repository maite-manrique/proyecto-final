<?php foreach ($items as $item): ?>
    <p>
        Producto: <?= $item->product->name ?> |
        Cantidad: <?= $item->quantity ?> |
        Precio: <?= $item->product->price ?>
    </p>
<?php endforeach; ?>
