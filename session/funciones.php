<?php 
    $productos = [
        "01" => ["nombre" => "Camisa", "precio" => 20],
        "02" => ["nombre" => "Pantalón", "precio" => 30],
        "03" => ["nombre" => "Zapatos", "precio" => 150]
    ];

    function escaparate ($productos) {
        foreach ($productos as $ref => $p) {
            echo "<tr>";
            echo "<td>" . $ref . "</td>";
            echo "<td>" . $p['nombre'] . "</td>";
            echo "<td>" . $p['precio'] . "</td>";
            echo "<td><a href='añadiralcarro.php?id={$ref}'>Comprar</a></td>";
            echo "</tr>";
        }
    }

    function mostrar_carrito () {

        $carrito = unserialize($_COOKIE['carro']);

        $total = contar_productos();

        if (!empty($carrito)) {
            foreach ($carrito as $ref => $valor) {
                echo "<tr>";
                echo "<td>" . $ref . "</td>";
                echo "<td>" . $valor . "</td>";
                echo "</tr>";        
            }
            echo "<tr>";
            echo "<td colspan='2'> Número total de unidades: " . $total . "</td>";
            echo "</tr>";        

        } else {
            echo "<tr>";
            echo "<td colspan='2'> No hay ningun producto en el carrito</td>";
            echo "</tr>";   
        }
    }

    function contar_productos () {
        $carrito = unserialize($_COOKIE['carro']);

        $total = 0;
        if (!empty($carrito)) {
            foreach ($carrito as $car => $valor) {
                $total += $valor;
            }
        }

        return $total;
    }
?>