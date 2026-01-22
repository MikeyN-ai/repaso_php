<?php
    include("funciones.php");
?>

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>Contenido del carrito</h1>
        <table border="1" align="center">
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Unidades</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    mostrar_carrito();
                ?>
            </tbody>
        </table>

        <div><a href='tienda.php' class="boton finalizar">Seguir comprando</a></div>
        <div><a href='realizarcompra.php' class="seguir boton">Finalizar compra</a></div>
    </body>
</html>