<?php
    include "inicia_conexion.php";
    session_start();

    $dpi = $_POST['dpi'];
    $clave = $_POST['clave'];

    $stmt = $conexion->prepare("SELECT * from odontologo where dpi = ? and clave = ?");
    $stmt->bind_param("is", $dpi, $clave);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $_SESSION['dpi'] = $dpi;
        echo "<script>window.location.href='inicio_dentro.php';</script>";
    } else {
        echo "<script>alert('DPI o contrasena incorrectos'); window.location.href='inicio.php';</script>";

    }
  
?>