<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$posicion = $_POST['posicion'];
$dorsal = $_POST['dorsal'];

mysqli_query($conexion, "INSERT INTO jugadores (nombre, posicion, dorsal)
VALUES ('$nombre', '$posicion', '$dorsal')");

header("Location: index.php");
?>
