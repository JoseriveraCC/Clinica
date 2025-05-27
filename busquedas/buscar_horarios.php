<!DOCTYPE html>
<?php
include "../inicia_conexion.php";
?>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Tabla de Horarios</title>
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

    <h2>Tabla de Horarios</h2>


    <table>
        <thead>
            <tr>
                <td>Horarios ID</td>
                <td>Hora de Inicio</td>
                <td>Hora de Cierre</td>
                <td>Editar</td>
                <td>Eliminar</td>
                <?php
                
                $sql = "SELECT * FROM horarios 
                WHERE hora_Inicio like '%".$_POST["hora_Inicio"]."%' 
                AND hora_Fin like '%".$_POST["hora_Fin"]."%'";


                $result = mysqli_query($conexion,$sql);
                while ($fila = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$fila['horarios']."</td>";
                    echo "<td>".$fila['hora_Inicio']."</td>";
                    echo "<td>".$fila['hora_Fin']."</td>";
                    echo "<td><a href='editar_horarios.php?horarios=".$fila['horarios']."'>Editar</a></td>";
                    echo "<td><a href='eliminar_horarios.php?horarios=".$fila['horarios']."'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </thead>
    </table>
    <br><br>
    <a href="busqueda_horarios.php" class="btn-volver">Regresar</a>

    <?php

    $conexion->close();
    ?>

    </body>
</html>