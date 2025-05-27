<?php
include "inicia_conexion.php";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dpi = $_POST['dpi'];
$telefono = $_POST['telefono'];
$clave = $_POST['clave'];

// Valida datos y guarda odontologo
try {
    $stmt = $conexion->prepare("INSERT INTO odontologo (dpi, clave, nombre, apellido, telefono) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $dpi, $clave, $nombre, $apellido, $telefono);

    if ($stmt->execute()) {
        echo "<script>alert('Odontólogo registrado exitosamente'); window.location.href='inicio.php';</script>";
    } else {
        echo "<script>alert('Error al registrar odontólogo'); window.location.href='crear_cuenta.php';</script>";
    }
    
    $stmt->close();

} catch (mysqli_sql_exception $e) {

    if ($e->getCode() == 1062) {
        echo "<script>alert('El odontólogo con ese DPI ya está registrado'); window.location.href='crear_cuenta.php';</script>";
    } else {
        echo "<script>alert('Error inesperado: " . $e->getMessage() . "');</script>";
    }
}

$stmt->close();
$conexion->close();
?>
