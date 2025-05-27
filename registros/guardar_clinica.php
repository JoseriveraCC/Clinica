<?php
include "../inicia_conexion.php";

$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

try {
    $stmt = $conexion->prepare("INSERT INTO clinica (direccion, telefono) VALUES (?, ?)");
    $stmt->bind_param("si", $direccion, $telefono);

    if ($stmt->execute()) {
        echo "<script>alert('Consulta registrada exitosamente'); window.location.href='registro_clinica.php';</script>";
    } else {
        echo "<script>alert('Error al registrar consulta'); window.location.href='registro_clinica.php';</script>";
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1452) {
        // Código 1452 = clave foránea inválida
        echo "<script>alert('El correo del paciente no existe'); window.location.href='registro_clinica.php';</script>";
    } else {
        echo "<script>alert('Error inesperado: " . $e->getMessage() . "');</script>";
    }
}

$conexion->close();
?>
