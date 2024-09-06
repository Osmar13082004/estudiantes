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
        include "controlador/eliminar.php"
    ?>
    <div class="container-fluid row">
        <form class="col-4" p-3 method="POST">
            <h3 class="text-center text-secondary">Registro de estudiantes</h3>
            <?php
            include "controlador/registro.php"
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Edad</label>
                <input type="text" class="form-control" name="edad">
            </div>
            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera</label>
                <select id="buscador" class="form-control" name="id_carrera">
                    <option value="0">Seleccionar</option>
                    <?php
                    // Consulta para obtener las carreras
                    $sqlCarreras = $conexion->query("SELECT id_carrera, nombre FROM carrera");

                    // Generar las opciones del select
                    while ($carrera = $sqlCarreras->fetch_object()) {
                        echo "<option value='$carrera->id_carrera'>$carrera->nombre</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistro" value="ok">Registrar</button>
        </form>
        <div class="col-8" p-4>
            <table class="table table-dark table-striped">
                <thead class="">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Carrera</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT estudiante.id_estudiante, estudiante.nombre, estudiante.apellido, estudiante.edad, carrera.id_carrera, carrera.nombre AS nombre_carrera
                        FROM estudiante
                        JOIN carrera ON estudiante.id_carrera = carrera.id_carrera");

                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_estudiante ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->edad ?></td>
                            <td><?= $datos->nombre_carrera ?></td>
                            <td>
                                <a href="modificar.php?id_estudiante=<?= $datos->id_estudiante ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index.php?id_estudiante=<?= $datos->id_estudiante ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php    }
                    ?>

                </tbody>
            </table>
            <div>
                <button class="btn btn-primary">
                        <a href="carreras.php" style="text-decoration: none; color: black;" >Carreras</a>
                </button>
            </div>
        </div>
    </div>
</body>

</html>