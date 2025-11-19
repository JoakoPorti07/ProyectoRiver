<?php
include "conexion.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM jugadores WHERE id=$id");

header("Location: listar_jugadores.php");
exit;
?>
