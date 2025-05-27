<!DOCTYPE html>
<?php
include 'inicia_conexion.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Registros y Busquedas</title>
</head>
    <body>
        <div class="contenedor-botones">
        <div class="menu">
            <li class="item" id="mn1">
                <a class="btn" href="./registros/registros.php">REGISTROS</a>
            </li>
            <li class="item" id="mn2">
                <a class="btn" href="./busquedas/busquedas.php">BUSQUEDAS</a>
            </li>
        </div>
        <div class="menu">
            <li class="item" id="mn3">
                <a class="btn-volver" href="inicio.php">SALIR</a>
            </li>
        </div>
    </div>
    </body>
</html>