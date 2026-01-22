<?php
    $carro = [];
    setcookie('carro', serialize($carro), time() - 3600);
    header("Location: tienda.php");
    exit;
?>