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
    <title>Consulta Alumno</title>
</head>

<body>
    <section class="m-5">
        <div class="container">
            <form action="consulta_alumno.php" method="get" 
                  class="bg-light p-5 rounded shadow mx-auto"
                  style="max-width: 600px;">
                <h1 class="mb-4 text-center">Buscar alumno</h1>
                <div class="mb-3">
                    <label for="mail" class="form-label">Ingrese mail:</label>
                    <input type="text" class="form-control" id="mail" name="mail" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="../index.php" class="btn btn-outline-secondary">← Volver</a>
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>

            </form>
        </div>

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
        </div>

    </section>
</body>

</html>

<?php
if (!empty($_GET['mail'])) {
    include("conexion.php");

    $email = $_GET['mail'];

    $sql = "select * from alumnos where mail='$email'";

    $alumnos = mysqli_query($conexion, $sql)
        or die("Problemas en el select: " . mysqli_error($conexion));

    mysqli_close($conexion);

    if (mysqli_num_rows($alumnos) > 0) {
        while ($alumno = mysqli_fetch_array($alumnos)) {
            echo "<div class='m-5 d-flex justify-content-center'>";
            echo "<div style='text-align: left;'>";
            echo "<h1>Datos del alumno</h1>";
            echo "Código: " . $alumno['codigo'] . "<br>";
            echo "Nombre: " . $alumno['nombre'] . "<br>";
            echo "Curso: " . $alumno['codigocurso'] . "<br>";
            echo "Mail: " . $alumno['mail'] . "<br>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<h5>No se encontraron resultados para el correo electrónico: $email</h5>";
    }


}
?>