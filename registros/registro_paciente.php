<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Paciente</title>
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

        input[type="text"], input[type="email"], input[type="tel"] {
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

<form action="guardar_paciente.php" method="POST">
    <h2>Registrar Paciente</h2>

    <label for="correo">Correo electrónico:</label>
    <input type="email" name="correo" id="correo" required>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required>

    <label for="telefono">Telefono:</label>
    <input type="tel" name="telefono" id="telefono" required>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion">

    <input type="submit" value="Registrar">
    <a href="registros.php" class="btn-volver">Regresar</a>
</form>

</body>
</html>
