<?php
include "../inicia_conexion.php";

$precio = $_POST['precio'];


$stmt = $conexion->prepare("INSERT INTO precio (precio) VALUES (?)");
$stmt->bind_param("i", $precio);

if ($stmt->execute()) {
    echo "<script>alert('Precio registrado exitosamente'); window.location.href='registro_precio.php';</script>";
} else {
    echo "<script>alert('Error al registrar precio'); window.location.href='registro_precio.php';</script>";
}

$stmt->close();


$conexion->close();
?>