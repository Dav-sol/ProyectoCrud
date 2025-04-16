<?php
include("conexion.php");
$alumnoss = mysqli_query(mysql: $conexion, query: "SELECT codigo, nombre, mail FROM alumnos") or
die("Problemas en el select alumnos" . mysqli_error(mysql: $conexion));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
<section>
    <h1>Modificar alumno</h1>
    <form action="registros_db/modificar_alumno.php" method="post">
        Código del alumno: <input type="number" name="codigo_viejo" required><br><br>
        Nuevo código del alumno: <input type="number" name="codigo_nuevo" required><br><br>
        Nuevo nombre: <input type="text" name="nombre" required><br><br>
        Nuevo correo: <input type="email" name="mail_nuevo" required><br><br>
        <input type="submit" value="Actualizar alumno">
    </form>

    <h1>Lista de alumnos</h1>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Mail</th>
                <?php while ($alumno = mysqli_fetch_assoc($alumnoss)): ?>
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
    echo "El alumno ha sido actualizado exitosamente.";
    echo "<br><a href='../index.php'>Volver</a>";

    mysqli_close($conexion);
} else {
    echo "Por favor, complete todos los campos.";
    echo "<br><a href='../index.php'>Volver</a>";
}
?>
