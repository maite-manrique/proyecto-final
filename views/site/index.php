<?php

/** @var yii\web\View $this */

$this->title = 'Proyecto Final WAWA';
?>
<?php
// session_start();
// include 'conexion.php';

// $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
// $sql = "SELECT * FROM productos";
// if ($categoria) {
//     $sql .= " WHERE categoria = '$categoria'";
// }

// $result = $conn->query($sql);
// $this->title="Tienda en linea";
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
        <section class="Productos-destacados">
            <h2>Productos destacados</h2>
            
            <div class="productos">
                <!--Ejemplo de los productos destacados -->
                <div class="producto col-lg-4 col-sm-6">
                    <img src="multimedia/" alt="Labial">
                    <p>Labial Mate</p>
                    <p>$2500</p>
                </div>

                <div class="producto col-lg-4 col-sm-6">
                    <img src="multimedia/" alt="Delineador Liquido">
                    <p>Delineador Liquido</p>
                    <p>$3000</p>
                </div>

                <div class="producto col-lg-4 col-sm-6">
                    <img src="multimedia/" alt="Sombra de ojos">
                    <p>Sombra de ojos</p>
                    <p>$5000</p>
                </div>
                
            </div>
            <!-- Podemos repetir este div de productos para los que destaquemos -->
        </section>
    </div>
         <button>Agregar al carrito <i class="fab fa-shopify"></i></button>
        <section class="Suscripción">
            <p>Suscribete para recibir ofertas exclusivas</p>
            <input type="email" placeholder="Correo Electrónico">
            <button>Suscribirse</button>
        </section>
</div>

