
<?php
include "../inicia_conexion.php";

if (isset($_GET['clinica_horarios']) && isset($_GET['horarios']) && isset($_GET['clinica'])) {
$clinica_horarios = $_GET['clinica_horarios'];
$horarios = $_GET['horarios'];
$clinica = $_GET['clinica'];

$sql = "SELECT * FROM horarios WHERE horarios = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $horarios);
$stmt->execute();
$resultado = $stmt->get_result();
$horarios = $resultado->fetch_assoc();

$sql = "SELECT * FROM clinica WHERE clinica = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $clinica);
$stmt->execute();
$resultado = $stmt->get_result();
$clinica = $resultado->fetch_assoc();
// Obtener datos actuales
$sql = "SELECT * FROM clinica_horarios WHERE clinica_horarios = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $clinica_horarios);
$stmt->execute();
$resultado = $stmt->get_result();
$clinica_horarios = $resultado->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clinica con Hora</title>
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

        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], select {
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
    <form action="actualizar_clinicahora.php" method="POST">
    <h2>Editar Clinica con Hora</h2>
    <input type="hidden" name="clinica_horarios" value="<?= $clinica_horarios['clinica_horarios'] ?>">

    <label for="hora_Inicio">Hora de Inicio:</label>
    <select name="horarios" id="horarios" required>
    <option value="<?= $horarios['horarios'] ?>"><?= $horarios['hora_Inicio']?></option>
        <?php
        $result = $conexion->query("SELECT * FROM horarios");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['horarios']}'>{$row['hora_Inicio']}</option>";
        }
        ?>
    </select>

    <label for="hora_Fin">Hora de Cierre:</label>
    <select name="horarios" id="horarios" required>
    <option value="<?= $horarios['horarios'] ?>"><?= $horarios['hora_Fin']?></option>
        <?php
        $result = $conexion->query("SELECT * FROM horarios");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['horarios']}'>{$row['hora_Fin']}</option>";
        }
        ?>
    </select>

    <label for="direccion">Direccion:</label>
    <select name="clinica" id="clinica" required>
    <option value="<?= $clinica['clinica'] ?>"><?= $clinica['direccion'] ?></option>
        <?php
        $result = $conexion->query("SELECT * FROM clinica");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['clinica']}'>{$row['direccion']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Editar Clinica con Hora">
    <a href="busqueda_clinicahora.php" class="btn-volver">Regresar</a>
</form>
</body>
</html>
