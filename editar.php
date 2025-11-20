<?php
include("conexion.php");

$id = $_GET['id'];
$consulta = mysqli_query($conexion, "SELECT * FROM jugadores WHERE id=$id");
$fila = mysqli_fetch_assoc($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="m-3">Editar jugador</h2>

<form action="actualizar.php" method="POST" class="mx-3">

    <input type="hidden" name="id" value="<?= $fila['id'] ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" class="form-control" value="<?= $fila['nombre'] ?>" required>

    <label class="mt-3">Posición:</label>
    <input type="text" name="posicion" class="form-control" value="<?= $fila['posicion'] ?>" required>

    <label class="mt-3">Dorsal:</label>
    <input type="number" name="dorsal" class="form-control" value="<?= $fila['dorsal'] ?>" required>

    <button class="btn btn-warning mt-3">Actualizar</button>
    <a href="index.php" class="btn btn-secondary mt-3">Volver</a>

</form>

</body>
</html>
