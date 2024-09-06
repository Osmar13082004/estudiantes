<?php
    if (!empty($_GET["id_estudiante"])) {
        $id=$_GET["id_estudiante"];
        $sql=$conexion->query("delete from estudiante where id_estudiante=$id");
        if ($sql==1) {
            
        }else{
            echo '<div>Error al eliminar</div>';
        }
    }
?>
