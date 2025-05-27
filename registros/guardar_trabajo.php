<?php
include "../inicia_conexion.php";

$nombre = $_POST['nombre'];


$stmt = $conexion->prepare("INSERT INTO trabajo (nombre) VALUES (?)");
$stmt->bind_param("s", $nombre);

if ($stmt->execute()) {
    echo "<script>alert('Trabajo registrado exitosamente'); window.location.href='registro_trabajo.php';</script>";
} else {
    echo "<script>alert('Error al registrar Trabajo'); window.location.href='registro_trabajo.php';</script>";
}

$stmt->close();


$conexion->close();
?>