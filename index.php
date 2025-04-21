<?php
include("registros_db/conexion.php");

$cursos_select = mysqli_query($conexion, "SELECT id, nombre FROM curso") or
    die("Problemas en el select cursos" . mysqli_error($conexion));

$alumnos = mysqli_query($conexion, "SELECT codigo, nombre, mail FROM alumnos") or
    die("Problemas en el select alumnos" . mysqli_error($conexion));

$cursos = mysqli_query($conexion, "SELECT id, nombre, estado FROM curso") or
    die("Problemas en el select cursos" . mysqli_error($conexion));
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Unisimon</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Menú Principal</h1>

        <h2>Registrar alumnos</h2>
        <form action="registros_db/registrar_alumno.php" method="post" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mail</label>
                <input type="email" name="mail" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select name="codigocurso" class="form-select">
                    <?php while ($curso = mysqli_fetch_array($cursos_select)): ?>
                        <option value="<?= $curso['id'] ?>"><?= $curso['nombre'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

        <h2>Registrar curso</h2>
        <form action="registros_db/registrar_curso.php" method="post" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Nombre del curso</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select">
                    <option value="A">Activo</option>
                    <option value="I">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

        <h2>Lista de alumnos</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($alumno = mysqli_fetch_assoc($alumnos)): ?>
                    <tr>
                        <td><?= $alumno['codigo'] ?></td>
                        <td><?= $alumno['nombre'] ?></td>
                        <td><?= $alumno['mail'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Lista de cursos</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($curso = mysqli_fetch_assoc($cursos)): ?>
                    <tr>
                        <td><?= $curso['id'] ?></td>
                        <td><?= $curso['nombre'] ?></td>
                        <td><?= $curso['estado'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Buscar alumno por mail</h2>
        <form action="registros_db/consulta_alumno.php" method="get" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Mail</label>
                <input type="email" name="mail" class="form-control">
            </div>
            <button type="submit" class="btn btn-info">Buscar</button>
        </form>

        <h2>Eliminar alumno por mail</h2>
        <form action="registros_db/eliminar_alumno.php" method="post" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Mail</label>
                <input type="email" name="mail" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>

        <h2>Eliminar curso</h2>
        <form action="registros_db/eliminar_curso.php" method="post" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Nombre del curso</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>

        <h2>Eliminar todos los registros</h2>
        <form action="registros_db/eliminar_todo.php" method="post" class="mb-4">
            <label class="form-label">¿Qué deseas borrar?</label><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tabla" value="alumno">
                <label class="form-check-label">Todos los alumnos</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tabla" value="curso">
                <label class="form-check-label">Todos los cursos</label>
            </div>
            <br>
            <button type="submit" class="btn btn-warning">Eliminar todo</button>
        </form>

        <h2>Modificar alumnos</h2>
        <form action="registros_db/modificar_alumno.php" method="post" class="mb-5">
            <div class="mb-3">
                <label class="form-label">Correo actual</label>
                <input type="email" name="mail_viejo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nuevo correo</label>
                <input type="email" name="mail_nuevo" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar correo</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
