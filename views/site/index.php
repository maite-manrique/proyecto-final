<?php

/** @var yii\web\View $this */

$this->title = 'Proyecto Final';
?>
<div class="site-index">
<?php
session_start();
include 'conexion.php';

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$sql = "SELECT * FROM productos";
if ($categoria) {
    $sql .= " WHERE categoria = '$categoria'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en línea</title>
    <link rel="stylesheet" href="site.css">
    <style>
        .producto {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }
        .producto img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h1>Tienda en línea</h1>
    
    <div>
        <a href="index.php"><b>Todos los productos</b></a> | 
        <a href="index.php?categoria=bases">Bases</a> | 
        <a href="index.php?categoria=correctores">Correctores</a> | 
        <a href="index.php?categoria=herramientas">Herramientas</a>
         <a href="index.php?categoria=labiales">Labiales</a>
         <a href="index.php?categoria=sombras">Sombras</a>
         <a href="index.php?categoria=polvos">Polvos</a>
         <a href="index.php?categoria=rubores">Rubores</a>
         <a href="index.php?categoria=primers">Primers</a>
         <a href="index.php?categoria=máscaras">Máscaras</a>
         <a href="index.php?categoria=iluminadores">Iluminadores</a>
         <a href="index.php?categoria=esmaltes">Esmaltes</a>
         <a href="index.php?categoria=contornos">Contornos</a>
         <a href="index.php?categoria=bronceadores">Bronceadores</a>
         <a href="index.php?categoria=cejas">Cejas</a>
         <a href="index.php?categoria=fijadores">Fijadores</a>
    </div>
    
    <div>
        <form method="GET" action="index.php">
            <input type="text" name="search" placeholder="Buscar productos...">
            <button type="submit">Buscar</button>
        </form>
    </div>
    
    <div class="productos">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='producto'>";
                echo "<img src='imagenes/" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>";
                echo "<h2>" . $row['nombre'] . "</h2>";
                echo "<p>" . $row['descripcion'] . "</p>";
                echo "<p><strong>Precio: $" . $row['precio'] . "</strong></p>";
                echo "<form method='POST' action='carrito.php'>";
                echo "<input type='hidden' name='producto_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='agregar_carrito'>Añadir al carrito</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>No se encontraron productos</p>";
        }
        ?>
    </div>

    <section class="Productos-destacados">
        <h2>Productos destacados</h2>
        <div class="productos">
            <!--Ejemplo de los productos destacados -->
            <div class="producto">
                <img src="agregar nombre del producto" alt="Labial">
                <p>Labial Mate</p>
                <p>$2000</p>
            </div>
            <button>Agregar al carrito</button>
        </div>
    <!-- Podemos repetir este div de productos para los que destaquemos -->
    </section>

    <section class="Suscripción">
        <p>Suscribete para recibir ofertas exclusivas</p>
        <input type="email" placeholder="Correo Electrónico">
        <button>Suscribirse</button>
    </section>

    <footer>
        <p>© 2024 Tienda online de msquillaje. Todos los derechos reservados</p>
        <div class="Encuentranos en nuestras redes sociales">
            <a href="">Instagram</a>
            <a href="">Facebook</a>
            <a href="">TikTok</a>
        </div>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
</div>

