<?php


if (!empty($_GET["id_carrera"])) {
    $id = $_GET["id_carrera"];
    $conexion->query("DELETE FROM estudiante WHERE id_carrera = $id");
    $sql = $conexion->query("delete from carrera where id_carrera=$id");
    if ($sql == 1) {
    } else {
        echo '<div>Error al eliminar</div>';
    }
}
