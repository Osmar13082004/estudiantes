<?php
    if (!empty($_POST["btnregistro"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["edad"])) {
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $telefono=$_POST["edad"];
            $direccion=$_POST["id_carrera"];

            $sql=$conexion->query("insert into estudiante(nombre,apellido,edad,id_carrera)values('$nombre','$apellido',$telefono,'$direccion')");
            if ($sql==1) {
                echo '<div class="alert alert-success">Alumno registrado correctamente</div>';
            } else {
                '<div class="alert alert-danger">Alumno registrado incorrectamente</div>';
            }
            
        }else{
            echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
        }
    }
?>