<?php
include "../inicia_conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $precioid = $_POST['precioid'];
    $precio = $_POST['precio'];

    $sql = "UPDATE precio SET precio = ? WHERE precioid = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $precio, $precioid);

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
    <title>Actualizar Precio</title>
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
    <a href="buscar_precio.php">Regresar</a>
</body>
</html>
