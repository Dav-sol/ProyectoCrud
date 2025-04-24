<?php
include("conexion.php");
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
    <title>Eliminar Curso</title>
</head>

<body>
    <section class="m-5">
        <div class="container">
            <form action="eliminar_curso.php" method="post"
                onsubmit="return confirm('¿Está seguro de que desea eliminar este curso?');"
                class="bg-light p-5 rounded shadow mx-auto" style="max-width: 600px;">

                <h1 class="mb-4 text-center">Eliminar Curso</h1>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del curso:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="../index.php" class="btn btn-outline-secondary">← Volver</a>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>

            </form>
        </div>

        <div class="mt-5">
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





    </section>

</body>

</html>

<?php
if (!empty($_POST['nombre'])) {
    include("conexion.php");

    $nombre = $_POST['nombre'];

    $consulta = mysqli_query($conexion, "select * from curso where nombre='$nombre'");

    if (mysqli_num_rows($consulta) > 0) {

        $eliminar = mysqli_query($conexion, "delete from curso where nombre='$nombre'")
            or die("Error al eliminar: " . mysqli_error($conexion));
        header("Location: ../index.php");

    } else {
        echo "<html> <h5> No existe un curso con ese nombre.<h5> <br><html>";
    }

    mysqli_close($conexion);

}
?>