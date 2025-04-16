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
    <link rel="stylesheet" href="../style.css">
    <title>Eliminar Curso</title>
</head>
<body>
        <section>
        <h1>Eliminar curso</h1>
        <form action="eliminar_curso.php" method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar este curso?');">
            Ingrese nombre del curso a eliminar:
            <input type="text" name="nombre" required><br>
            <input type="submit" value="Eliminar">
        </form>
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
        echo "No existe un curso con ese nombre.<br>";
    }

    mysqli_close($conexion);

}
?>

<a href="../index.php">←Volver al menú</a>


