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
    <link rel="stylesheet" href="../style.css">
    <title>Consulta Alumno</title>
</head>
<body>
<section>
        <h1>Buscar alumno por mail</h1>
        <form action="consulta_alumno.php" method="get" >
            <label>Ingrese mail:
                <input type="text" name="mail" required><br>
            </label>
            <input type="submit" value="Buscar" required>
        </form>
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

        <a href="../index.php">←Volver al menú</a>

    </section>
</body>
</html>

<?php 
if (!empty($_GET['mail'])) {  
    include("conexion.php");

    $email = $_GET['mail'];  
    
    $sql="select * from alumnos where mail='$email'";
    
    $alumnos = mysqli_query($conexion, $sql) 
        or die("Problemas en el select: " . mysqli_error($conexion));
    
    mysqli_close($conexion);

    if (mysqli_num_rows($alumnos) > 0) {
        while ($alumno = mysqli_fetch_array($alumnos)) {
        echo "<h1>Datos del alumno</h1>";
        echo "Código: " . $alumno['codigo'] . "<br>";
        echo "Nombre: " . $alumno['nombre'] . "<br>";
        echo "Curso: " . $alumno['codigocurso'] . "<br>";
        echo "Mail: " . $alumno['mail'] . "<br>";

        }
    } else {
        echo "No se encontraron resultados para el correo electrónico: $email";
    }
        

}
?>



