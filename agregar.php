<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="m-3">Agregar jugador</h2>

<form action="insertar.php" method="POST" class="mx-3 p-2" style="width: 300px;">
    <label>Nombre:</label>
    <input type="text" name="nombre" class="form-control" required>

    <label class="mt-3">Posición:</label>
    <input type="text" name="posicion" class="form-control" required>

    <label class="mt-3">Dorsal:</label>
    <input type="number" name="dorsal" class="form-control" required>

    <button class="btn btn-primary mt-3">Guardar</button>
    <a href="index.php" class="btn btn-secondary mt-3">Volver</a>
</form>

</body>
</html>
