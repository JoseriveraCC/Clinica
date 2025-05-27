<?php
include "../inicia_conexion.php";

if (isset($_GET['cita'])) {
    $cita = $_GET['cita'];

    $sql = "DELETE FROM cita WHERE cita = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $cita);


    try {
        if ($stmt->execute()) {
            echo "<script>alert('Consulta eliminada correctamente.');window.location.href = 'busqueda_cita.php';</script>";
        } else {
        throw new Exception("No se pudo eliminar.");
        }
    } catch (mysqli_sql_exception $e) {
        if (strpos($e->getMessage(), 'a foreign key constraint fails') !== false) {
        echo "<script>alert('No se puede eliminar esta consulta porque está relacionada con otros datos.');window.location.href = 'busqueda_cita.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar: " . addslashes($e->getMessage()) . "');window.location.href = 'busqueda_cita.php';</script>";
        }
    };
}
?>