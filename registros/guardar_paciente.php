<?php
include "../inicia_conexion.php";

$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

try {
    $stmt = $conexion->prepare("INSERT INTO paciente (correo, nombre, apellido, telefono, direccion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $correo, $nombre, $apellido, $telefono, $direccion);

    if ($stmt->execute()) {
        echo "<script>alert('Paciente registrado exitosamente'); window.location.href='registro_paciente.php';</script>";
    } else {
        echo "<script>alert('Error al registrar paciente'); window.location.href='registro_paciente.php';</script>";
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        // Código 1062 = entrada duplicada
        echo "<script>alert('El paciente con ese correo ya está registrado'); window.location.href='registro_paciente.php';</script>";
    } else {
        echo "<script>alert('Error inesperado: " . $e->getMessage() . "');</script>";
    }
}

$conexion->close();
?>