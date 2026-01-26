<?php 
    include('Cliente.class.php');

    $contenido = true;
    $clientes = Cliente::todos()??'';
    $error = '';
    $mensaje = '';

    if (isset($_GET['error'])) {
        $error = $_GET['error']; 
    }

    if (isset($_GET['mess'])) {
        $mensajes = $_GET['mess'];
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado clientes</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Listado clientes</h1>
        <?php 
            if (!$clientes) {
                echo "<p>No hay clientes</p>";
            } else {
                echo '<table border=1>
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Localidad</th>
                            <th>Provincia</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($clientes as $cli) {
                        echo "<tr>";
                        echo    "<td>" . $cli->getDni() . "</td>";
                        echo    "<td>" . $cli->getNombre() . "</td>";
                        echo    "<td>" . $cli->getDireccion() . "</td>";
                        echo    "<td>" . $cli->getLocalidad() . "</td>";
                        echo    "<td>" . $cli->getProvincia() . "</td>";
                        echo    "<td>" . $cli->getTelefono() . "</td>";
                        echo    "<td>" . $cli->getEmail() . "</td>";
                        echo    '<td> 
                                    <a href="editarcliente.php?dni=' .$cli->getDni().'">Editar</a>
                                    <a href="borrarcliente.php?dni=' .$cli->getDni(). '">Borrar</a>
                                </td>';
                        echo "</tr>";
                    }
                echo '
                    </tbody>
                </table>
                ';
            }
        ?>
    </body>
</html>