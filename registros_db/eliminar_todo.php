<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>eliminar todo</title>
</head>

<body>
    <section>
        <h1>Eliminar todos los registros</h1>

        <form action="eliminar_todo.php" method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar todos los registros?');">
            <div class="mb-3">
                <label for="tabla" class="form-label">Seleccione la tabla a eliminar:</label>
                <select class="form-select" name="tabla" id="tabla" required>
                    <option value="" disabled selected>Seleccione una tabla</option>
                    <option value="alumno">Alumno</option>
                    <option value="curso">Curso</option>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Todo</button>
    </section>
</body>

</html>

<?php
if (!empty($_POST['tabla'])) {
    include("conexion.php");

    $tabla = $_POST['tabla'];

    if ($tabla === "alumno" || $tabla === "curso") {
        $sql = "delete from $tabla";
        if (mysqli_query($conexion, $sql)) {
            echo "Se eliminaron todos los registros de la tabla $tabla";
        } else {
            echo "Error al eliminar los registros: " . mysqli_error($conexion);
        }

        echo "<br><a href='../index.php'>Volver</a>";

    }
    mysqli_close($conexion);

}
?>