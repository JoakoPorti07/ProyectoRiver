<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $posicion = $_POST['posicion'];
    $nacionalidad = $_POST['nacionalidad'];
    $dorsal = $_POST['dorsal'];

    $sql = "INSERT INTO jugadores (nombre, posicion, nacionalidad, dorsal)
            VALUES ('$nombre', '$posicion', '$nacionalidad', '$dorsal')";

    mysqli_query($conn, $sql);

    header("Location: listar_jugadores.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Jugador</title>
</head>
<body>

<h1>Agregar Jugador</h1>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br><br>
    Posición: <input type="text" name="posicion" required><br><br>
    Nacionalidad: <input type="text" name="nacionalidad" required><br><br>
    Dorsal: <input type="number" name="dorsal" required><br><br>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
