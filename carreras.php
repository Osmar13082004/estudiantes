<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2c8fa1aa5e.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar(){
            var respuesta=confirm("¿Estas seguro de eliminar el registro?");
            return respuesta();
        }
    </script>
    <h1 class="text-center">CRUD Estudiantes 2024</h1>
    <?php
        include "modelo/conexion.php";
        include "controlador/eliminar_carrera.php"
    ?>
    <div class="container-fluid row">
        <form class="col-4" p-3 method="POST">
            <h3 class="text-center text-secondary">Registro de carreras</h3>
            <?php
            include "controlador/nueva_carrera.php"
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
            <button type="submit" class="btn btn-primary" name="btnregistro" value="ok">Registrar</button>
        </form>
        <div class="col-8" p-4>
            <table class="table table-dark table-striped">
                <thead class="">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha de fin</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM carrera");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_carrera ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->fecha_inicio ?></td>
                            <td><?= $datos->fecha_fin ?></td>
                            <td>
                                <a href="modificar_carrera.php?id_carrera=<?= $datos->id_carrera ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="carreras.php?id_carrera=<?= $datos->id_carrera ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php    }
                    ?>

                </tbody>
            </table>
            <div>
                <button class="btn btn-primary">
                        <a href="index.php" style="text-decoration: none; color: black;" >Estudiantes</a>
                </button>
            </div>
        </div>
    </div>
</body>

</html>