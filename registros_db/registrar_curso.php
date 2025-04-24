<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" </head>

<body>
    <section class="m-5">
        <div class="container">
            <form action="registrar_curso.php" method="post" class="bg-light p-5 rounded shadow mx-auto"
                style="max-width: 600px;">

                <h1 class="mb-4 text-center">Registrar Cursos</h1>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del curso:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-4">
                    <label for="estado" class="form-label">Estado del curso:</label>
                    <select name="estado" id="estado" class="form-select" required>
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                    </select>
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

    $sql = "insert into curso(nombre,estado) values 
     ('$_POST[nombre]','$_POST[estado]')";

    mysqli_query($conexion, $sql)
        or die("Problemas en el select" . mysqli_error($conexion));

    mysqli_close($conexion);
    header("Location: ../index.php");


}
?>