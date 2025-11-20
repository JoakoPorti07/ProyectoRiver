<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$posicion = $_POST['posicion'];
$dorsal = $_POST['dorsal'];

mysqli_query($conexion, 
"UPDATE jugadores SET 
nombre='$nombre', 
posicion='$posicion', 
dorsal='$dorsal'
WHERE id=$id"
);

header("Location: index.php");
?>
