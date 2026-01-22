<?php

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: tienda.php");
        exit;
    }

    $carro = unserialize($_COOKIE['carro']);
    $ref = $_GET['id'];

    if (isset($carro[$ref])) {
        $carro[$ref] += 1;
    } else {
        $carro[$ref] = 1;
    }

    setcookie('carro', serialize($carro), time() + 3600);

    header("Location: tienda.php");
?>