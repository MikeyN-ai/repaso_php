<?php
    include("funciones.php");

    $carrito = unserialize($_COOKIE['carro']);
?>

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi tienda</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>Mi tienda</h1>
        <table border="1" align="center">
            <?php
                $total = contar_productos();
                if ($total > 0) {
                    echo "<caption>El carrito tiene " . $total . " productos</caption>";
                } else {
                    echo "<caption>El carrito no tiene productos</caption>";
                }
            ?>
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    escaparate($productos);
                ?>
            </tbody>
        </table>
        <div>
            <a href='vercarrito.php' class='boton seguir'>Ver carrito</a>
        </div>
    </body>
</html>