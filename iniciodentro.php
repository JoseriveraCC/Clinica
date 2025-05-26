<!DOCTYPE html>
<?php
include 'inicia_conexion.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
    <div class="menu">
        <li class="item" id="mn1">
            <a class="btn" href="#mn1">REGISTROS</a>
            <div class="submenu">
                <a href="./registro.php">Registrar Nuevo Alumno</a>
                <a href="./registro_salon.php">Registrar Salón</a>
                <a href="./registro_profesor.php">Registrar Profesor</a>
                <a href="./registro_profesor_asistente.php">Registrar Auxiliar</a>
                <a href="./registro_materias_libro.php">Registrar Bibliografía</a>
                <a href="./registro_categoria.php">Registrar Puesto</a>
                <a href="./registro_alumno_materia.php">Registrar Materia</a>
            </div>
        </li>
        <li class="item" id="mn2">
            <a class="btn" href="#mn2">BUSQUEDAS</a>
            <div class="submenu">
                <a href="./buscar_alumno.php">Buscar Alumno</a>
                <a href="./buscar_salon.php">Buscar Salón</a>
                <a href="./buscar_profesor.php">Buscar Profesor</a>
                <a href="./buscar_asistente.php">Buscar Auxiliar</a>
                <a href="./buscar_bibliografia.php">Buscar Bibliografía</a>
                <a href="./buscar_puesto.php">Buscar Puesto</a>
                <a href="./buscar_materias.php">Buscar Materia</a>
            </div>
        </li>
        
    </div>
    </body>
</html>