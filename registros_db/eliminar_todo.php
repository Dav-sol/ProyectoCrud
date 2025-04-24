<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>eliminar todo</title>
</head>

<body>
    <section class="m-5">
        <div class="container">
            <form action="eliminar_todo.php" method="post" class="bg-light p-5 rounded shadow mx-auto"
                style="max-width: 600px;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar?');">
                <h1 class="mb-4 text-center">Eliminar Todo</h1>
                <div class="mb-3">
                    <label for="tabla" class="form-label">Seleccione la tabla a eliminar:</label>
                    <select class="form-select" name="tabla" id="tabla" required>
                        <option value="" disabled selected>Seleccione una tabla</option>
                        <option value="alumnos">Alumnos</option>
                        <option value="curso">Curso</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="../index.php" class="btn btn-outline-secondary">← Volver</a>
                    <button type="submit" class="btn btn-danger">Eliminar Todo</button>
                </div>
    </section>
</body>

</html>

<?php
if (!empty($_POST['tabla'])) {
    include("conexion.php");

    $tabla = $_POST['tabla'];

    if ($tabla === "alumnos" || $tabla === "curso") {
        $sql = "delete from $tabla";
        if (mysqli_query($conexion, $sql)) {
            echo "Se eliminaron todos los registros de la tabla $tabla";
        } else {
            echo "Error al eliminar los registros: " . mysqli_error($conexion);
        }
    }
    mysqli_close($conexion);

}
?>