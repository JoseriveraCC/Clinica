<?php
include "../inicia_conexion.php";

$fecha = $_POST['fecha'];
$correo = $_POST['correo'];

try {
    $stmt = $conexion->prepare("INSERT INTO consulta (fecha, correo) VALUES (?, ?)");
    $stmt->bind_param("ss", $fecha, $correo);

    if ($stmt->execute()) {
        echo "<script>alert('Consulta registrada exitosamente'); window.location.href='registro_consulta.php';</script>";
    } else {
        echo "<script>alert('Error al registrar consulta'); window.location.href='registro_consulta.php';</script>";
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1452) {
        // Código 1452 = clave foránea inválida
        echo "<script>alert('El correo del paciente no existe'); window.location.href='registro_consulta.php';</script>";
    } else {
        echo "<script>alert('Error inesperado: " . $e->getMessage() . "');</script>";
    }
}

$conexion->close();
?>
