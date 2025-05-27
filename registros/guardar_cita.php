<?php
include "../inicia_conexion.php";

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$trabajo = $_POST['trabajo'];
$precioid = $_POST['precioid'];
$consulta = $_POST['consulta'];
$dpi = $_POST['dpi'];

try {
    $stmt = $conexion->prepare("INSERT INTO cita (fecha, hora, trabajo, precioid, consulta, dpi) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $fecha, $hora, $trabajo, $precioid, $consulta, $dpi);

    if ($stmt->execute()) {
        echo "<script>alert('Cita registrada exitosamente'); window.location.href='registro_cita.php';</script>";
    } else {
        echo "<script>alert('Error al registrar cita'); window.location.href='registro_cita.php';</script>";
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1452) {
        // Código 1452 = clave foránea inválida
        echo "<script>alert('Error: Clave foránea inválida'); window.location.href='registro_cita.php';</script>";
    } else {
        echo "<script>alert('Error inesperado: " . $e->getMessage() . "');</script>";
    }
}

$conexion->close();
?>