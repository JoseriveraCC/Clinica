<?php
include "../inicia_conexion.php";

$hora_Inicio = $_POST['hora_Inicio'];
$hora_Fin = $_POST['hora_Fin'];

try {
    $stmt = $conexion->prepare("INSERT INTO horarios (hora_Inicio, hora_Fin) VALUES (?, ?)");
    $stmt->bind_param("ss", $hora_Inicio, $hora_Fin);

    if ($stmt->execute()) {
        echo "<script>alert('Consulta registrada exitosamente'); window.location.href='registro_horarios.php';</script>";
    } else {
        echo "<script>alert('Error al registrar consulta'); window.location.href='registro_horarios.php';</script>";
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1452) {
        // Código 1452 = clave foránea inválida
        echo "<script>alert('El correo del paciente no existe'); window.location.href='registro_horarios.php';</script>";
    } else {
        echo "<script>alert('Error inesperado: " . $e->getMessage() . "');</script>";
    }
}

$conexion->close();
?>
