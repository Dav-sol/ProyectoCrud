<?php
include("registros_db/conexion.php");

$alumnos = mysqli_query(mysql: $conexion, query: "SELECT codigo, nombre, mail,codigocurso FROM alumnos") or
    die("Problemas en el select alumnos" . mysqli_error(mysql: $conexion));

$cursos = mysqli_query(mysql: $conexion, query: "SELECT id, nombre, estado FROM curso") or
    die("Problemas en el select cursos" . mysqli_error(mysql: $conexion));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>CRUD</title>
</head>

<body>
    <section class="container mt-5">
        <h1 class="text-center mb-4">Lista de alumnos</h1>
        <div>
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Mail</th>
                        <th>Cod-Curso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($alumno = mysqli_fetch_assoc($alumnos)): ?>
                        <tr>
                            <td class="text-center"><?= $alumno['codigo'] ?></td>
                            <td><?= $alumno['nombre'] ?></td>
                            <td><?= $alumno['mail'] ?></td>
                            <td><?= $alumno['codigocurso'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="registros_db/registrar_alumno.php" class="btn btn-outline-primary">Registrar Alumno</a>
        <a href="registros_db/consulta_alumno.php" class="btn btn-outline-info">Consultar Alumno</a>
        <a href="registros_db/eliminar_alumno.php" class="btn btn-outline-danger">Eliminar Alumno</a>
        <a href="registros_db/eliminar_todo.php" class="btn btn-outline-danger">Eliminar Todo</a>
        <a href="registros_db/modificar_alumno.php" class="btn btn-outline-success">Modificar Alumno</a>

    </div>

    </section>

    <section class="container mt-5">
        <h1 class="text-center mb-4">Lista de cursos</h1>
        <div>
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($curso = mysqli_fetch_assoc($cursos)): ?>
                        <tr>
                            <td class="text-center"><?= $curso['id'] ?></td>
                            <td><?= $curso['nombre'] ?></td>
                            <td><?= $curso['estado'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center gap-3 m-4">
            <a href="registros_db/registrar_curso.php" class="btn btn-outline-primary">Registrar curso</a>
            <a href="registros_db/eliminar_curso.php" class="btn btn-outline-danger">Eliminar curso</a>
        </div>
    </section>


</body>

</html>