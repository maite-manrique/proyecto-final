<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Carousel;

$this->title = 'Proyecto Final WAWA';
?>
<div class="site-index">
    <br><br>
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <form method="GET" action="index.php">
            <input type="text" name="search" placeholder="Buscar productos...">
            <button type="submit">Buscar</button>
        </form>
    </div>
    <div class="body-content">
        <div class="productos">
            <?php
            // // if ($result->num_rows > 0) {
            //     while ($row = $result->fetch_assoc()) {
            //         echo "<div class='producto'>";
            //         echo "<img src='imagenes/" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>";
            //         echo "<h2>" . $row['nombre'] . "</h2>";
            //         echo "<p>" . $row['descripcion'] . "</p>";
            //         echo "<p><strong>Precio: $" . $row['precio'] . "</strong></p>";
            //         echo "<form method='POST' action='carrito.php'>";
            //         echo "<input type='hidden' name='producto_id' value='" . $row['id'] . "'>";
            //         echo "<button type='submit' name='agregar_carrito'>Añadir al carrito</button>";
            //         echo "</form>";
            //         echo "</div>";
            //     }
            // } else {
            //     echo "<p>No se encontraron productos</p>";
            // }
            ?>
        </div>

            <div class="row">
        <!-- Tarjeta 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img src="@web/image/LabialMate.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Producto 1</h5>
                    <p class="card-text">Descripción breve del producto 1. Destaca sus principales características.</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img src="@web/image/Sombradeojos.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Producto 2</h5>
                    <p class="card-text">Descripción breve del producto 2. Información adicional relevante.</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img src="@web/image/DelineadorLiquido.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Producto 3</h5>
                    <p class="card-text">Descripción breve del producto 3. Aspectos a destacar.</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>

        <button>Agregar al carrito <i class="fab fa-shopify"></i></button>
        <section class="Suscripción">
            <p>Suscribete para recibir ofertas exclusivas</p>
            <input type="email" placeholder="Correo Electrónico">
            <button>Suscribirse</button>
        </section>
        <footer>
            <p>© 2024 Tienda online de maquillaje. Todos los derechos reservados</p>
            <div class="Encuentranos en nuestras redes sociales">
                <a href="">Instagram</a>
                <a href="">Facebook</a>
                <a href="">TikTok</a>
            </div>
        </footer>
    </div>
</div>
