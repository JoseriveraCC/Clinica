<?php
include "../inicia_conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clinica_horarios = $_POST['clinica_horarios'];
    $horarios = $_POST['horarios'];
    $clinica = $_POST['clinica'];

    $sql = "UPDATE clinica_horarios SET horarios = ?, clinica = ? WHERE clinica_horarios = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iii", $horarios, $clinica, $clinica_horarios);

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
    <title>Actualizar Clinica con Hora</title>
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
    <a href="busqueda_clinicahora.php">Regresar</a>
</body>
</html>
