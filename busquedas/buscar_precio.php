<!DOCTYPE html>
<?php
include "../inicia_conexion.php";
?>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Tabla de precios</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
    padding: 40px;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
    }
    th {
    background-color: #4CAF50;
    color: white;
    }
    tr:hover {
    background-color: #f1f1f1;
    }
    h2 {
    text-align: center;
    color: #333;
    }
    .btn-volver {
    display: inline-block;
    padding: 12px 25px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-size: 16px;
    transition: background-color 0.3s ease;
    }

    .btn-volver:hover {
        background-color: #328d35;
    }
    </style>
</head>
    <body>

    <h2>Tabla de precios</h2>


    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Precio</td>
                <td>Editar</td>
                <td>Eliminar</td>
                <?php
                $sql = "SELECT * from precio";

                $result = mysqli_query($conexion,$sql);
                while ($fila = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$fila['precioid']."</td>";
                    echo "<td>".$fila['precio']."</td>";
                    echo "<td><a href='editar_precio.php?precioid=".$fila['precioid']."'>Editar</a></td>";
                    echo "<td><a href='eliminar_precio.php?precioid=".$fila['precioid']."'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </thead>
    </table>
    <br><br>
    <a href="busquedas.php" class="btn-volver">Regresar</a>

    <?php

    $conexion->close();
    ?>

    </body>
</html>