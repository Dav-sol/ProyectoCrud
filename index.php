<?php
include("registros_db/conexion.php");

$alumnos = mysqli_query(mysql: $conexion, query: "SELECT codigo, nombre, mail FROM alumnos") or
    die("Problemas en el select alumnos" . mysqli_error(mysql: $conexion));

$cursos = mysqli_query(mysql: $conexion, query: "SELECT id, nombre, estado FROM curso") or
    die("Problemas en el select cursos" . mysqli_error(mysql: $conexion));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1>Menu Principal</h1>
    <section>
        <h1>Lista de alumnos</h1>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Mail</th>
                <?php while ($alumno = mysqli_fetch_assoc($alumnos)): ?>
                <tr>
                    <td><?= $alumno['codigo'] ?></td>
                    <td><?= $alumno['nombre'] ?></td>
                    <td><?= $alumno['mail'] ?></td>

                </tr>
                <?php endwhile; ?>
            </tr>
        </table>
        <table>
            <tr>
             <td><a href="registros_db/registrar_alumno.php">Registrar Alumno</a></td>
             <td><a href="registros_db/consulta_alumno.php">Consultar Alumno</a></td>
             <td><a href="registros_db/eliminar_alumno.php">Eliminar Alumno</a></td>
             <td><a href="registros_db/eliminar_todo.php">Eliminar Todo</a></td>
             <td><a href="registros_db/modificar_alumno.php">Modificar Alumno</a></td>
            </tr>
        </table>
    </section>

    <section>
        <h1>Lista de cursos </h1>
        <table border="1">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
            <?php while ($curso = mysqli_fetch_assoc($cursos)): ?>
                <tr>
                    <td><?= $curso['id'] ?></td>
                    <td><?= $curso['nombre'] ?></td>
                    <td><?= $curso['estado'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <table>
            <tr>
             <td><a href="registros_db/registrar_curso.php">Registrar Curso</a></td>
             <td><a href="registros_db/eliminar_curso.php">Eliminar Curso</a></td>
             <td><a href="registros_db/eliminar_todo.php">Eliminar Todo</a></td>
            </tr>
        </table>
    </section>
</body>

</html>
