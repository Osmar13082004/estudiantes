<?php 
    $conexion = new mysqli("localhost", "root", "", "estudiantes");
    
    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    
    $conexion->set_charset("utf8");
?>
