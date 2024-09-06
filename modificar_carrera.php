<?php
include "modelo/conexion.php";

if (isset($_GET['id_carrera'])) {
    $id = $_GET['id_carrera'];

    $sql = $conexion->query("SELECT * FROM carrera WHERE id_carrera = $id");
    if (!$sql) {
        die("Error en la consulta: " . $conexion->error);
    }

    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        echo "No se encontró un cliente con ese ID.";
        exit;
    }
} else {
    echo "No se ha pasado un ID válido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar carreras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">CRUD Estudiantes 2024</h1>
    <div class="container-fluid row ">
        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Modificacion de carreras</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/editar_carrera.php"
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de inicio</label>
                <input type="datetime-local" class="form-control" name="fecha_inicio">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de fin</label>
                <input type="datetime-local" class="form-control" name="fecha_fin">
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</a></button>
            </div>
        </form>
    </div>

</html>