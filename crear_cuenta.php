
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cuenta - Odontólogo</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
        }
        form {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        max-width: 400px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        }
        input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        }
        a[class="button"] {
        text-decoration: none;
        background-color: #4CAF50;
        color: white;
        }
        div {
            margin-top: 10px;
            text-align: center;
            background-color: #4CAF50;
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 94%;
        }
    </style>
    </head>
<body>

<h2 style="text-align:center;">Registro de Odontólogo</h2>

<form action="guardar_odontologo.php" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>

    <label>Apellido:</label>
    <input type="text" name="apellido" required>

    <label>DPI:</label>
    <input type="text" name="dpi" required>

    <label>Teléfono:</label>
    <input type="tel" name="telefono" required>

    <label>Contraseña:</label>
    <input type="password" name="clave" required>

    <input type="submit" value="Registrar">
    <br>
    <div>
        <a href="inicio.php" class="button" id="boton2">Regresar</a>
    </div>
</form>

</body>
</html>
