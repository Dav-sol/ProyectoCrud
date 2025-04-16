
<?php 
include(("conexion.php"));
$cursos_select = mysqli_query(mysql: $conexion, query: "SELECT id, nombre FROM curso") or
die("Problemas en el select cursos" . mysqli_error(mysql: $conexion));
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Registrar Alumno</title>
</head> 
<body>
   <section>
        <h1>Registrar alumnos</h1>
        <form action="registrar_alumno.php" method="post">

            <label>Ingrese nombre:
                <input type="text" name="nombre" required>
            </label><br>

            <label>Ingrese mail:
                <input type="text" name="mail"required><br>
            </label><br>

            <label> Seleccione el curso:
                <select name="codigocurso" >
                    <?php while ($curso = mysqli_fetch_array($cursos_select)): ?>
                        <option value="<?= $curso['id'] ?>"><?= $curso['nombre'] ?></option>
                    <?php endwhile; ?>
                </select>
            </label>
            <input type="submit" value="Registrar">
        </form>
        <a href="../index.php">←Volver al menú</a>

   </section>
   </body>
</html>


<?php
if (!empty($_REQUEST)) {
     include("conexion.php");

     $sql="insert into alumnos(nombre,mail,codigocurso) values 
     ('$_POST[nombre]','$_POST[mail]',$_POST[codigocurso])";

     mysqli_query($conexion,$sql)
        or die("Problemas en el select" . mysqli_error($conexion));

     mysqli_close($conexion);
     header("Location: ../index.php");



    }
?>