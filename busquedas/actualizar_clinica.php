<?php
include "../inicia_conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clinica = $_POST['clinica'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE clinica SET direccion = ?, telefono = ? WHERE clinica = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sii", $direccion, $telefono, $clinica);

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
    <a href="busqueda_clinica.php">Regresar</a>
</body>
</html>
