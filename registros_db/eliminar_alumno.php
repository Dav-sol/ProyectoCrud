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
    <title>Eliminar Alumno por Código</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section>
        <h1>Eliminar alumno por código</h1>
        <form action="eliminar_alumno.php" method="post">
            <label>Ingrese código:
                <input type="number" name="codigo" required><br>
            </label>
            <input type="submit" value="Eliminar">
        </form>
        <a href="../index.php">← Volver al menú</a>
    </section>

    <section>
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
    </section>
</body>
</html>

<?php
if (!empty($_POST['codigo'])) {
    include("conexion.php");

    $codigo = $_POST['codigo'];
    $nombre = $_GET['nombre']; // Asumiendo que el nombre se envía desde el formulario, aunque no es necesario para eliminar

    $consulta = mysqli_query($conexion, "SELECT * FROM alumnos WHERE codigo='$codigo'");
    
    if (mysqli_num_rows($consulta) > 0) {
        $eliminar = mysqli_query($conexion, "DELETE FROM alumnos WHERE codigo='$codigo'")
            or die("Error al eliminar: " . mysqli_error($conexion));
        
            echo "Alumno con código $codigo y nombre $nombre eliminado correctamente.<br>";
        } else {
        echo "No existe un alumno con ese código.<br>";
    }

    echo "<a href='../index.php'>Volver</a>";
    mysqli_close($conexion);
}
?>
