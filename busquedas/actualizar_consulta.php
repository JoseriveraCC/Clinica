<?php
include "../inicia_conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consulta = $_POST['consulta'];
    $fecha = $_POST['fecha'];

    $sql = "UPDATE consulta SET fecha = ? WHERE consulta = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $fecha, $consulta);

    if ($stmt->execute()) {
        echo "Consulta actualizada correctamente.";
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar consulta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <a href="busqueda_consulta.php">Regresar</a>
</body>
</html>
