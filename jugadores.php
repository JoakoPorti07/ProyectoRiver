<?php
include("conexion.php"); // tu conexión $conn

// Agregar jugador
if(isset($_GET['agregar'])){
    $dorsal = $_GET['dorsal'];
    $nombre = $_GET['nombre'];
    $posicion = $_GET['posicion'];

    mysqli_query($conn, "INSERT INTO jugadores (dorsal, nombre, posicion) VALUES ('$dorsal','$nombre','$posicion')");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Editar jugador
if(isset($_GET['editar'])){
    $dorsal = $_GET['editar'];
    $res = mysqli_query($conn, "SELECT * FROM jugadores WHERE dorsal='$dorsal'");
    $jugadorEditar = mysqli_fetch_assoc($res);
}

// Actualizar jugador
if(isset($_GET['actualizar'])){
    $dorsalViejo = $_GET['dorsal_viejo']; // necesitamos el dorsal original
    $dorsalNuevo = $_GET['dorsal'];
    $nombre = $_GET['nombre'];
    $posicion = $_GET['posicion'];

    mysqli_query($conn, "UPDATE jugadores SET dorsal='$dorsalNuevo', nombre='$nombre', posicion='$posicion' WHERE dorsal='$dorsalViejo'");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Eliminar jugador
if(isset($_GET['eliminar'])){
    $dorsal = $_GET['eliminar'];
    mysqli_query($conn, "DELETE FROM jugadores WHERE dorsal='$dorsal'");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Obtener todos los jugadores
$resultado = mysqli_query($conn, "SELECT * FROM jugadores ORDER BY dorsal ASC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIVER PLATE - JUGADORES</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles4.css">
</head>
<body>
    <header>
        <h1 class="TituloPag">RIVER PLATE</h1>
        <!--Navegador-->
        <nav>
                <a href="index.html" class="nav">Inicio</a>
                <a href="historia.html" class="nav">Historia</a>
                <a href="jugadores.php" class="nav">Jugadores</a>
                <a href="contacto.html" class="nav">Contacto</a>
                <a href="login.html" class="nav">Socio Login</a>
        </nav>
    </header>
    <!--Jugadores-->
    <main>
        <section class="jugadoresdestacados">
            <h2 class="jugadoresTitulo">Jugadores Destacados</h2>
            <p>Conoce a algunos de los jugadores más emblemáticos que han vestido la camiseta de River Plate a lo largo de su historia.</p>
            <ul class="listadestacados">
                <li>Enzo Francescoli</li>
                <li>Norberto Alonso</li>
                <li>Ángel Labruna</li>
                <li>Marcelo Gallardo</li>
                <li>Hernán Crespo</li>
            </ul>
        </section>

        <h2 class="jugadoresTitulo">Jugadores Primera Division</h2>
        <section>
            <!-- Formulario para agregar o editar -->
    <form method="get" class="formulario-jugadores">
        <?php if(isset($jugadorEditar)): ?>
            <input type="hidden" name="dorsal_viejo" value="<?php echo $jugadorEditar['dorsal']; ?>">
        <?php endif; ?>

        <label>Dorsal:</label><br>
        <input type="text" name="dorsal" required value="<?php echo isset($jugadorEditar) ? $jugadorEditar['dorsal'] : ''; ?>"><br><br>

        <label>Nombre:</label><br>
        <input type="text" name="nombre" required value="<?php echo isset($jugadorEditar) ? $jugadorEditar['nombre'] : ''; ?>"><br><br>

        <label>Posición:</label><br>
        <input type="text" name="posicion" required value="<?php echo isset($jugadorEditar) ? $jugadorEditar['posicion'] : ''; ?>"><br><br>

        <?php if(isset($jugadorEditar)): ?>
            <button type="submit" name="actualizar">Actualizar</button>
        <?php else: ?>
            <button type="submit" name="agregar">Agregar</button>
        <?php endif; ?>
    </form>

    <hr>

            <table class="tablaprimeradivision">
                <thead>
                    <tr>
                        <th>Dorsal</th>
                        <th>Nombre</th>
                        <th>Posición</th>
                        <th>Nacionalidad</th>
                    </tr>
                </thead>
                <tbody>
 <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $fila['dorsal']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['posicion']; ?></td>
                <td>
                    <a href="?editar=<?php echo $fila['dorsal']; ?>" 
                       style="padding:5px 10px; background:#4CAF50; color:white; text-decoration:none; border-radius:4px;">
                       Editar
                    </a>
                    <a href="?eliminar=<?php echo $fila['dorsal']; ?>" 
                       onclick="return confirm('¿Seguro que querés eliminar este jugador?');"
                       style="padding:5px 10px; background:#f44336; color:white; text-decoration:none; border-radius:4px;">
                       Eliminar
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>

    <!-- Arqueros -->
    <tr><td>1</td><td>Franco Armani</td><td>Arquero</td><td>Argentina</td></tr>
    <tr><td>25</td><td>Jeremías Ledesma</td><td>Arquero</td><td>Argentina</td></tr>
    <tr><td>41</td><td>Santiago Beltrán</td><td>Arquero</td><td>Argentina</td></tr>

    <!-- Defensores -->
    <tr><td>2</td><td>Federico Gattoni</td><td>Defensor</td><td>Argentina</td></tr>
    <tr><td>4</td><td>Gonzalo Montiel</td><td>Defensor</td><td>Argentina</td></tr>
    <tr><td>6</td><td>Germán Pezzella</td><td>Defensor</td><td>Argentina</td></tr>
    <tr><td>13</td><td>Lautaro Rivero</td><td>Defensor</td><td>Argentina</td></tr>
    <tr><td>14</td><td>Sebastián Boselli</td><td>Defensor</td><td>Uruguay</td></tr>
    <tr><td>16</td><td>Fabricio Bustos</td><td>Defensor</td><td>Argentina</td></tr>
    <tr><td>17</td><td>Paulo Díaz</td><td>Defensor</td><td>Chile</td></tr>
    <tr><td>20</td><td>Milton Casco</td><td>Defensor</td><td>Argentina</td></tr>
    <tr><td>21</td><td>Marcos Acuña</td><td>Defensor</td><td>Argentina</td></tr>
    <tr><td>28</td><td>Lucas Martínez Quarta</td><td>Defensor</td><td>Argentina</td></tr>

    <!-- Mediocampistas -->
    <tr><td>5</td><td>Juan Carlos Portillo</td><td>Mediocampista</td><td>Argentina</td></tr>
    <tr><td>8</td><td>Maximiliano Meza</td><td>Mediocampista</td><td>Argentina</td></tr>
    <tr><td>10</td><td>Juan Fernando Quintero</td><td>Mediocampista</td><td>Colombia</td></tr>
    <tr><td>18</td><td>Gonzalo Martínez</td><td>Mediocampista</td><td>Argentina</td></tr>
    <tr><td>22</td><td>Kevin Castaño</td><td>Mediocampista</td><td>Colombia</td></tr>
    <tr><td>23</td><td>Matías Galarza</td><td>Mediocampista</td><td>Paraguay</td></tr>
    <tr><td>24</td><td>Enzo Pérez</td><td>Mediocampista</td><td>Argentina</td></tr>
    <tr><td>26</td><td>Ignacio Fernández</td><td>Mediocampista</td><td>Argentina</td></tr>
    <tr><td>34</td><td>Giuliano Galoppo</td><td>Mediocampista</td><td>Argentina</td></tr>

    <!-- Delanteros -->
    <tr><td>9</td><td>Miguel Borja</td><td>Delantero</td><td>Colombia</td></tr>
    <tr><td>11</td><td>Facundo Colidio</td><td>Delantero</td><td>Argentina / Italia</td></tr>
    <tr><td>15</td><td>Sebastián Driussi</td><td>Delantero</td><td>Argentina</td></tr>
    <tr><td>27</td><td>Bautista Dadín</td><td>Delantero</td><td>Argentina</td></tr>
    <tr><td>32</td><td>Agustín Ruberto</td><td>Delantero</td><td>Argentina</td></tr>

  </tbody>
</table>

        </section>
    </main>
    

    

    <footer>
        <p> 2025 RIVER PLATE. Todos los derechos reservados.</p>
    </footer>
</body>
</html>