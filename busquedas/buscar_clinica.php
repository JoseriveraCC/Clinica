<!DOCTYPE html>
<?php
include "../inicia_conexion.php";
?>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Tabla de Clinicas</title>
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

    <h2>Tabla de Clinicas</h2>


    <table>
        <thead>
            <tr>
                <td>Clinica ID</td>
                <td>Direccion</td>
                <td>Telefono</td>
                <td>Editar</td>
                <td>Eliminar</td>
                <?php
                
                $sql = "SELECT * FROM clinica 
                WHERE direccion like '%".$_POST["direccion"]."%' 
                AND telefono like '%".$_POST["telefono"]."%'";


                $result = mysqli_query($conexion,$sql);
                while ($fila = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$fila['clinica']."</td>";
                    echo "<td>".$fila['direccion']."</td>";
                    echo "<td>".$fila['telefono']."</td>";
                    echo "<td><a href='editar_clinica.php?clinica=".$fila['clinica']."'>Editar</a></td>";
                    echo "<td><a href='eliminar_clinica.php?clinica=".$fila['clinica']."'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </thead>
    </table>
    <br><br>
    <a href="busqueda_clinica.php" class="btn-volver">Regresar</a>

    <?php

    $conexion->close();
    ?>

    </body>
</html>