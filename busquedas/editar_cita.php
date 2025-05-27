
<?php
include "../inicia_conexion.php";

if (isset($_GET['cita'])) {
$cita = $_GET['cita'];

// Obtener datos actuales
$sql = "SELECT * FROM cita WHERE cita = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $cita);
$stmt->execute();
$resultado = $stmt->get_result();
$cita = $resultado->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="email"], input[type="tel"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"], .btn-volver {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .btn-volver {
            background-color: #28a745;
            width: 94%;
        }

        .btn-volver:hover {
            background-color: #218838;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form action="actualizar_cita.php" method="POST">
    <h2>Editar Cita</h2>
    <input type="hidden" name="cita" value="<?= $cita['cita'] ?>">

    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" value="<?= $cita['fecha'] ?>" required>

    <label for="hora">Hora:</label>
    <input type="time" name="hora" id="hora" value="<?= $cita['hora'] ?>" required>

    <input type="submit" value="Editar Cita">
    <a href="busqueda_cita.php" class="btn-volver">Regresar</a>
</form>
</body>
</html>
