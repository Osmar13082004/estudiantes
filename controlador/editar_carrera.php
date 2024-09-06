<?php
    if (!empty($_POST["btnmodificar"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["fecha_inicio"]) and !empty($_POST["fecha_fin"])) {
            $nombre=$_POST["nombre"];
            $fecha_inicio=$_POST["fecha_inicio"];
            $fecha_fin=$_POST["fecha_fin"];
            $id_carrera = $_GET['id_carrera'];

            $sql=$conexion->query("update carrera set nombre='$nombre', fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin' where id_carrera=$id_carrera");
            if ($sql==1) {
                header("Location: carreras.php");
            } else {
                '<div class="alert alert-danger">Estudiante editado incorrectamente</div>';
            }
            
        }else{
            echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
        }
    }
?>