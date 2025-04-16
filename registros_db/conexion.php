<?php
$conexion = mysqli_connect("localhost", "root", "", "unisimon") or
    die("Error de conexion");
if (isset($conexion)) {
} else {
    echo "<h2>Error de conexion</h2>";
}
?>