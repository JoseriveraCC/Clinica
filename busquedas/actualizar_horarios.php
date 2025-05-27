<?php
include "../inicia_conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $horarios = $_POST['horarios'];
    $hora_Inicio = $_POST['hora_Inicio'];
    $hora_Fin = $_POST['hora_Fin'];

    $sql = "UPDATE horarios SET hora_Inicio = ?, hora_Fin = ? WHERE horarios = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssi", $hora_Inicio, $hora_Fin, $horarios);

    if ($stmt->execute()) {
        echo "Horario se ha actualizado correctamente.";
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
    <title>Actualizar Horario</title>
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
    <a href="busqueda_horarios.php">Regresar</a>
</body>
</html>
