
<?php 
include(("conexion.php"));
$cursos_select = mysqli_query(mysql: $conexion, query: "SELECT id, nombre FROM curso") or
die("Problemas en el select cursos" . mysqli_error(mysql: $conexion));
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <title>Registrar Alumno</title>
</head> 
<body>
   <section class="m-5">
   <div class="container">
        <form action="registrar_alumno.php" 
              class="bg-light p-5 m-5 rounded shadow w-75 mx-auto" 
              style="max-width: 600px;"  method="post">
            <h1 class="mb-4 text-center">Registrar alumnos</h1>
            
            <div class="mb-3"
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class ="form-control" name="nombre" required>
            </div>

            <div class="mb-3"
            <label for="mail" class="form-label">Ingrese mail:</label>
            <input type="text" class ="form-control" name="mail" required>
            </div>

            <div class="mb-3">
            <label class="form-label"> Seleccione el curso:
                <select name="codigocurso" class="form-select" required>
                    <?php while ($curso = mysqli_fetch_array($cursos_select)): ?>
                        <option value="<?= $curso['id'] ?>"><?= $curso['nombre'] ?></option>
                    <?php endwhile; ?>
                </select>
            </label>
            </div>  
     
            <div class="d-flex justify-content-between">
                    <a href="../index.php" class="btn btn-outline-secondary">← Volver</a>
                    <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
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