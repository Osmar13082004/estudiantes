<?php
    if (!empty($_POST["btnregistro"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["fecha_inicio"]) and !empty($_POST["fecha_fin"])) {
            $nombre=$_POST["nombre"];
            $fecha_inicio=$_POST["fecha_inicio"];
            $fecha_fin=$_POST["fecha_fin"];

            $sql=$conexion->query("insert into carrera(nombre,fecha_inicio,fecha_fin)values('$nombre','$fecha_inicio','$fecha_fin')");
            if ($sql==1) {
                echo '<div class="alert alert-success">Carrera registrada correctamente</div>';
            } else {
                '<div class="alert alert-danger">Carrera registrada incorrectamente</div>';
            }
            
        }else{
            echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
        }
    }
?>