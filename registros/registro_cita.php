<!DOCTYPE html>
<?php
include "../inicia_conexion.php";
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cita</title>
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

<form action="guardar_cita.php" method="POST">
    <h2>Registrar Cita</h2>

    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" required>

    <label for="hora">Hora:</label>
    <input type="time" name="hora" id="hora" required>

    <label for="trabajo">Trabajo realizado:</label>
    <select name="trabajo" id="trabajo" required>
    <option value="">Seleccione un trabajo</option>
        <?php
        $result = $conexion->query("SELECT * FROM trabajo");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['trabajo']}'>{$row['nombre']}</option>";
        }
        ?>
    </select>


    <label for="precioid">Precio del trabajo:</label>
    <select name="precioid" id="precioid" required>
    <option value="">Seleccione un precio</option>
        <?php
        $result = $conexion->query("SELECT * FROM precio");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['precioid']}'>{$row['precio']}</option>";
        }
        ?>
    </select>

    <label for="consulta">Correo del paciente:</label>
    <select name="consulta" id="consulta" required>
    <option value="">Seleccione correo del paciente</option>
        <?php
        $result = $conexion->query("SELECT * FROM consulta");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['consulta']}'>{$row['correo']}</option>";
        }
        ?>
    </select>

    <label for="dpi">DPI del Odontólogo:</label>
    <select name="dpi" id="dpi" required>
    <option value="">Seleccione DPI del Odontologo</option>
        <?php
        $result = $conexion->query("SELECT dpi FROM odontologo");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['dpi']}'>{$row['dpi']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Registrar Cita">
    <a href="registros.php" class="btn-volver">Regresar</a>
</form>

</body>
</html>
