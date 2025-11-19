<?php
include "conexion.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM jugadores WHERE id=$id");
$jugador = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $posicion = $_POST['posicion'];
    $nacionalidad = $_POST['nacionalidad'];
    $dorsal = $_POST['dorsal'];

    $sql = "UPDATE jugadores SET 
            nombre='$nombre',
            posicion='$posicion',
            nacionalidad='$nacionalidad',
            dorsal='$dorsal'
            WHERE id=$id";

    mysqli_query($conn, $sql);

    header("Location: listar_jugadores.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jugador</title>
</head>
<body>

<h1>Editar Jugador</h1>

<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $jugador['nombre'] ?>" required><br><br>
    Posición: <input type="text" name="posicion" value="<?= $jugador['posicion'] ?>" required><br><br>
    Nacionalidad: <input type="text" name="nacionalidad" value="<?= $jugador['nacionalidad'] ?>" required><br><br>
    Dorsal: <input type="number" name="dorsal" value="<?= $jugador['dorsal'] ?>" required><br><br>

    <button type="submit">Actualizar</button>
</form>

</body>
</html>
