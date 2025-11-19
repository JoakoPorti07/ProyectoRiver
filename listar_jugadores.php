<?php
include "conexion.php";
$resultado = mysqli_query($conn, "SELECT * FROM jugadores");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrar Jugadores</title>
</head>
<body>

<h1>Lista de Jugadores</h1>

<a href="crear_jugador.php">➕ Agregar Nuevo Jugador</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Posición</th>
        <th>Nacionalidad</th>
        <th>Dorsal</th>
        <th>Acciones</th>
    </tr>

    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['posicion'] ?></td>
            <td><?= $fila['nacionalidad'] ?></td>
            <td><?= $fila['dorsal'] ?></td>

            <td>
                <a href="editar_jugador.php?id=<?= $fila['id'] ?>">✏ Editar</a> |
                <a href="eliminar_jugador.php?id=<?= $fila['id'] ?>"
                   onclick="return confirm('¿Eliminar jugador?')">🗑 Eliminar</a>
            </td>
        </tr>
    <?php } ?>

</table>

</body>
</html>
