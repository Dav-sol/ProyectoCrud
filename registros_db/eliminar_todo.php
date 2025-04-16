<section>
        <h1>Eliminar todos los registros</h1>
        <form action="registros_db/eliminar_todo.php" method="post">
            <label>¿Qué deseas borrar?</label><br>
            <label>
            <input type="radio" name="tabla" value="alumno">Todos los alumnos
            </label><br>
            <label>
            <input type="radio" name="tabla" value="curso"> Todos los cursos
            </label><br><br>
            <input type="submit" value="Eliminar todo">
        </form>
    </section>
<?php
if (!empty($_POST['tabla'])) {
    include("conexion.php");

    $tabla = $_POST['tabla'];

    if ($tabla === "alumno" || $tabla === "curso") {
        $sql="delete from $tabla";
         if (mysqli_query($conexion, $sql)){
            echo "Se eliminaron todos los registros de la tabla $tabla";
        } else {
            echo "Error al eliminar los registros: " . mysqli_error($conexion);
         }

        echo "<br><a href='../index.php'>Volver</a>";

    }
    mysqli_close($conexion);

}
?>