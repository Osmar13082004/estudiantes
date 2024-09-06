<?php
    if (!empty($_POST["btnmodificar"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["edad"])) {
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $telefono=$_POST["edad"];
            $direccion=$_POST["id_carrera"];
            $id_estudiante = $_GET['id_estudiante'];

            $sql=$conexion->query("update estudiante set nombre='$nombre', apellido='$apellido',edad=$telefono,id_carrera='$direccion' where id_estudiante=$id_estudiante");
            if ($sql==1) {
                header("Location: index.php");
            } else {
                '<div class="alert alert-danger">Estudiante editado incorrectamente</div>';
            }
            
        }else{
            echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
        }
    }
?>