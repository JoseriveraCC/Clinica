<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinica";
$port = 5222;

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>