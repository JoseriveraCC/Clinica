<?php
include "../inicia_conexion.php";

$horarios = $_POST['horarios'];
$clinica = $_POST['clinica'];

try {
    $stmt = $conexion->prepare("INSERT INTO clinica_horarios (horarios, clinica) VALUES (?, ?)");
    $stmt->bind_param("ii", $horarios, $clinica);

    if ($stmt->execute()) {
        echo "<script>alert('Clinica registrada exitosamente'); window.location.href='registro_clinicahora.php';</script>";
    } else {
        echo "<script>alert('Error al registrar clinica'); window.location.href='registro_clinicahora.php';</script>";
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1452) {
        // Código 1452 = clave foránea inválida
        echo "<script>alert('Error: Clave foránea inválida'); window.location.href='registro_clinicahora.php';</script>";
    } else {
        echo "<script>alert('Error inesperado: " . $e->getMessage() . "');</script>";
    }
}

$conexion->close();
?>