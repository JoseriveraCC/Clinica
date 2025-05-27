<!DOCTYPE html>
<?php
include "../inicia_conexion.php";
?>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Tabla de Citas</title>
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

    <h2>Tabla de Citas</h2>


    <table>
        <thead>
            <tr>
                <td>Cita ID</td>
                <td>Fecha</td>
                <td>Hora</td>
                <td>Trabajo</td>
                <td>Precio</td>
                <td>Consulta</td>
                <td>Correo</td>
                <td>DPI Odontologo</td>
                <td>Editar</td>
                <td>Eliminar</td>
                <?php
                $sql = "SELECT c.cita, c.fecha as fecha_cita, c.hora, t.trabajo, t.nombre, pr.precio, co.consulta, co.fecha as fecha_consulta, co.correo, o.dpi FROM cita c
                        JOIN trabajo t ON c.trabajo = t.trabajo
                        JOIN precio pr ON c.precioid = pr. precioid
                        JOIN consulta co ON c.consulta = co.consulta
                        JOIN odontologo o ON c.dpi = o.dpi
                        where c.fecha like '%".$_POST["fecha"]."%'
                        and c.hora like '%".$_POST["hora"]."%'
                        and t.trabajo like '%".$_POST["trabajo"]."%'
                        and o.dpi like '%".$_POST["dpi"]."%'
                        and co.consulta like '%".$_POST["consulta"]."%'";

                $result = mysqli_query($conexion,$sql);
                while ($fila = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$fila['cita']."</td>";
                    echo "<td>".$fila['fecha_cita']."</td>";
                    echo "<td>".$fila['hora']."</td>";
                    echo "<td>".$fila['nombre']."</td>";
                    echo "<td>".$fila['precio']."</td>";
                    echo "<td>".$fila['fecha_consulta']."</td>";
                    echo "<td>".$fila['correo']."</td>";                    
                    echo "<td>".$fila['dpi']."</td>";
                    echo "<td><a href='editar_cita.php?cita=".$fila['cita']."'>Editar</a></td>";
                    echo "<td><a href='eliminar_cita.php?cita=".$fila['cita']."'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </thead>
    </table>
    <br><br>
    <a href="busqueda_cita.php" class="btn-volver">Regresar</a>

    <?php

    $conexion->close();
    ?>

    </body>
</html>