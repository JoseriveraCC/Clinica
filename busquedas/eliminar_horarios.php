<?php
include "../inicia_conexion.php";

if (isset($_GET['horarios'])) {
    $horarios = $_GET['horarios'];

    $sql = "DELETE FROM horarios WHERE horarios = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $horarios);


    try {
        if ($stmt->execute()) {
            echo "<script>alert('Horario se ha eliminado correctamente.');window.location.href = 'busqueda_horarios.php';</script>";
        } else {
        throw new Exception("No se pudo eliminar.");
        }
    } catch (mysqli_sql_exception $e) {
        if (strpos($e->getMessage(), 'a foreign key constraint fails') !== false) {
        echo "<script>alert('No se puede eliminar este horario porque está relacionada con otros datos.');window.location.href = 'busqueda_horarios.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar: " . addslashes($e->getMessage()) . "');window.location.href = 'busqueda_horarios.php';</script>";
        }
    };
}
?>
