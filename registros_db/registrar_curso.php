<?php
if (!empty($_REQUEST)) {
     include("conexion.php");

     $sql="insert into curso(nombre,estado) values 
     ('$_POST[nombre]','$_POST[estado]')";

     mysqli_query($conexion,$sql)
        or die("Problemas en el select" . mysqli_error($conexion));

     mysqli_close($conexion);

     header("Location: ../index.php");
    }
?>
<html >
   <section>
        <h1>Registrar cursos</h1>
        <form action="registrar_curso.php" method="post">
            <label>Ingrese nombre del curso:
                <input type="text" id="nombre" name="nombre" required>
            </label>

            <label>Seleccione el estado del curso:
                <select name="estado">
                    <option value="A">activo</option>
                    <option value="I">inactivo</option>
                </select>
            </label>
            <input type="submit" value="Registrar">
        </form>
        <a href="../index.php">← Volver al menú</a>

   </section>
</html>