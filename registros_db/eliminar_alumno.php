<?php
include("conexion.php");
$alumnos = mysqli_query(mysql: $conexion, query: "SELECT codigo, nombre, mail FROM alumnos") or
    die("Problemas en el select alumnos" . mysqli_error(mysql: $conexion));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <section class="m-5">
    <div class="container">
        <form action="eliminar_alumno.php" method="post" 
              class="bg-light p-5 rounded shadow mx-auto" 
              style="max-width: 600px;" 
              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
             <h1 class="mb-4 text-center">Eliminar Alumno</h1>
             <div class="mb-3">
                <label for="codigo" class="form-label">Código del Alumno:</label>
                <input type="number" class="form-control" id="codigo" name="codigo" required>
             </div>

            <div class="d-flex justify-content-between">
                <a href="../index.php" class="btn btn-outline-secondary">← Volver</a>
                <button type="submit" class="btn btn-danger">Eliminar</button>
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
    </div>
   
</body>
</html>

<?php
if (!empty($_POST['codigo'])) {
    include("conexion.php");

    $codigo = $_POST['codigo'];
    $nombre = $_GET['nombre'];

    $consulta = mysqli_query($conexion, "SELECT * FROM alumnos WHERE codigo='$codigo'");
    
    if (mysqli_num_rows($consulta) > 0) {
        $eliminar = mysqli_query($conexion, "DELETE FROM alumnos WHERE codigo='$codigo'")
            or die("Error al eliminar: " . mysqli_error($conexion));
        
            echo "Alumno con código $codigo y nombre $nombre eliminado correctamente.<br>";

            header("Location: ../index.php");
            exit();
        } else {
        echo "No existe un alumno con ese código.<br>";
    }

    mysqli_close($conexion);

   
}
?>
