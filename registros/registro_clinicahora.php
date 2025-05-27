<!DOCTYPE html>
<?php
include "../inicia_conexion.php";
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cita con Horario</title>
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

        label, select {
            display: block;
            margin-top: 10px;
        }

        input[type="date"], input[type="time"], input[type="number"], select {
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

<form action="guardar_clinicahora.php" method="POST">
    <h2>Registrar Clinica con Horario</h2>

    <label for="hora_Inicio">Hora de Inicio:</label>
    <select name="horarios" id="horarios" required>
    <option value="">Seleccione un Hora de Inicio</option>
        <?php
        $result = $conexion->query("SELECT * FROM horarios");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['horarios']}'>{$row['hora_Inicio']}</option>";
        }
        ?>
    </select>

    <label for="hora_Fin">Hora de Cierre:</label>
    <select name="horarios" id="horarios" required>
    <option value="">Seleccione un Hora de Cierre</option>
        <?php
        $result = $conexion->query("SELECT * FROM horarios");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['horarios']}'>{$row['hora_Fin']}</option>";
        }
        ?>
    </select>

    <label for="direccion">Direccion:</label>
    <select name="clinica" id="clinica" required>
    <option value="">Seleccione una Direccion</option>
        <?php
        $result = $conexion->query("SELECT * FROM clinica");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['clinica']}'>{$row['direccion']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Registrar Clinica con Horario">
    <a href="registros.php" class="btn-volver">Regresar</a>
</form>

</body>
</html>
