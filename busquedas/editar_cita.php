
<?php
include "../inicia_conexion.php";

if (isset($_GET['cita']) && isset($_GET['trabajo']) && isset($_GET['precioid']) && isset($_GET['consulta']) && isset($_GET['dpi'])) {
    $cita = $_GET['cita'];
    $trabajo = $_GET['trabajo'];
    $precioid = $_GET['precioid'];
    $consulta = $_GET['consulta'];
    $dpi = $_GET['dpi'];

    // Obtener datos actuales
    $sql = "SELECT * FROM cita WHERE cita = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $cita);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $cita = $resultado->fetch_assoc();

    $sql = "SELECT * FROM trabajo WHERE trabajo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $trabajo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $trabajo = $resultado->fetch_assoc();

    $sql = "SELECT * FROM precio WHERE precioid = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $precioid);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $precioid = $resultado->fetch_assoc();

    $sql = "SELECT * FROM consulta WHERE consulta = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $consulta);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $consulta = $resultado->fetch_assoc();

    $sql = "SELECT * FROM odontologo WHERE dpi = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $dpi);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dpi = $resultado->fetch_assoc();
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

        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="time"], select {
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

    <label for="trabajo">Trabajo:</label>
    <select name="trabajo" id="trabajo" required>
    <option value="<?= $trabajo['trabajo'] ?>"><?= $trabajo['nombre']?></option>
        <?php
        $result = $conexion->query("SELECT * FROM trabajo");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['trabajo']}'>{$row['nombre']}</option>";
        }
        ?>
    </select>

    <label for="precio">Precio:</label>
    <select name="precioid" id="precioid" required>
    <option value="<?= $precioid['precioid'] ?>"><?= $precioid['precio']?></option>
        <?php
        $result = $conexion->query("SELECT * FROM precio");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['precioid']}'>{$row['precio']}</option>";
        }
        ?>
    </select>

    <label for="consulta">Consulta Fecha:</label>
    <select name="consulta" id="consulta" required>
    <option value="<?= $consulta['consulta'] ?>"><?= $consulta['fecha']?></option>
        <?php
        $result = $conexion->query("SELECT * FROM consulta");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['consulta']}'>{$row['fecha']}</option>";
        }
        ?>
    </select>

    <label for="odontologo">DPI Odontologo:</label>
    <select name="dpi" id="dpi" required>
    <option value="<?= $dpi['dpi'] ?>"><?= $dpi['dpi']?></option>
        <?php
        $result = $conexion->query("SELECT * FROM odontologo");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['dpi']}'>{$row['dpi']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Editar Cita">
    <a href="busqueda_cita.php" class="btn-volver">Regresar</a>
</form>
</body>
</html>
