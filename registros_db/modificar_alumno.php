<?php
include("conexion.php");
$alumnos = mysqli_query(mysql: $conexion, query: "SELECT codigo, nombre, mail FROM alumnos") or
    die("Problemas en el select alumnos" . mysqli_error(mysql: $conexion));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <section class="m-5">
        <div class="container">
            <form action="modificar_alumno.php" method="post" class="bg-light p-5 rounded shadow mx-auto"
                style="max-width: 600px;">
                <h1 class="mb-4 text-center">Modificar Alumno</h1>
                <div class="mb-3">
                    <label for="codigo_viejo" class="form-label">Código del Alumno:</label>
                    <input type="number" class="form-control" id="codigo_viejo" name="codigo_viejo" required>
                </div>
                <div class="mb-3">
                    <label for="codigo_nuevo" class="form-label">Nuevo Código del Alumno:</label>
                    <input type="number" class="form-control" id="codigo_nuevo" name="codigo_nuevo" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nuevo Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="mail_nuevo" class="form-label">Nuevo Correo:</label>
                    <input type="email" class="form-control" id="mail_nuevo" name="mail_nuevo" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="../index.php" class="btn btn-outline-secondary">← Volver</a>
                    <button type="submit" class="btn btn-success">Actualizar Alumno</button>
                </div>
            </form>
        </div>
    </section>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped shadow rounded">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
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
            </div>
        </div>
</body>

</html>

<?php

if (!empty($_POST['codigo_viejo']) && !empty($_POST['codigo_nuevo']) && !empty($_POST['nombre']) && !empty($_POST['mail_nuevo'])) {
    include("conexion.php");

    $codigo_viejo = $_POST['codigo_viejo'];
    $codigo_nuevo = $_POST['codigo_nuevo'];
    $nombre = $_POST['nombre'];
    $mail_nuevo = $_POST['mail_nuevo'];

    $sql = "update alumnos 
    set codigo='$codigo_nuevo', nombre='$nombre', mail='$mail_nuevo'
    where codigo='$codigo_viejo'";

    mysqli_query($conexion, $sql) or die("Error al actualizar: " . mysqli_error($conexion));

    mysqli_close($conexion);
    header("Location: modificar_alumno.php");

}
?>