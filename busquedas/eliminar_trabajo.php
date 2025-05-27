<?php
include "../inicia_conexion.php";

if (isset($_GET['trabajo'])) {
    $trabajo = $_GET['trabajo'];

    $sql = "DELETE FROM trabajo WHERE trabajo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $trabajo);


    try {
        if ($stmt->execute()) {
            echo "<script>alert('Consulta eliminada correctamente.');window.location.href = 'buscar_trabajo.php';</script>";
        } else {
        throw new Exception("No se pudo eliminar.");
        }
    } catch (mysqli_sql_exception $e) {
        if (strpos($e->getMessage(), 'a foreign key constraint fails') !== false) {
        echo "<script>alert('No se puede eliminar esta consulta porque está relacionada con otros datos.');window.location.href = 'buscar_trabajo.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar: " . addslashes($e->getMessage()) . "');window.location.href = 'buscar_trabajo.php';</script>";
        }
    };
}
?>