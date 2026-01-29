<?php
// CONTROLADOR: malaga_mvc/controllers/index.php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Jugador.php';

// Acción por defecto: listar
$action  = $_GET['action'] ?? 'listar';
$mensaje = '';

// En algunos casos necesitaremos un jugador concreto (para editar)
$jugador = null;

switch ($action) {
    case 'fichar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $exito = Jugador::crear(
                $_POST['nombre'],
                (int) $_POST['dorsal'],
                $_POST['posicion'],
                $_POST['foto'] !== '' ? $_POST['foto'] : 'sin_foto.png'
            );
            $mensaje = $exito ? 'Jugador fichado correctamente.' : 'Error al fichar el jugador.';
            $action  = 'listar';
        }
        break;

    case 'editar':
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        if ($id > 0) {
            $jugador = Jugador::obtenerPorId($id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id > 0) {
            $exito = Jugador::actualizar(
                $id,
                $_POST['nombre'],
                (int) $_POST['dorsal'],
                $_POST['posicion'],
                $_POST['foto'] !== '' ? $_POST['foto'] : 'sin_foto.png',
                (int) ($_POST['goles'] ?? 0)
            );
            $mensaje = $exito ? 'Jugador actualizado correctamente.' : 'Error al actualizar el jugador.';
            $action  = 'listar';
        }
        break;

    case 'eliminar':
        if (isset($_GET['id'])) {
            $id    = (int) $_GET['id'];
            $exito = Jugador::eliminar($id);
            $mensaje = $exito ? 'Jugador dado de baja.' : 'Error al eliminar el jugador.';
        }
        $action = 'listar';
        break;

    case 'listar':
    default:
        // No hacemos nada especial, simplemente listamos
        break;
}

// Siempre cargamos la lista de jugadores para la tabla principal
$jugadores = Jugador::listarTodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Málaga CF - Gestión de Plantilla</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>
<div class="container">
    <img src="assets/img/Málaga_CF.png" alt="Escudo Málaga CF" class="escudo-malaga">
    <h1>Málaga CF - Gestión de Plantilla</h1>

    <?php if ($mensaje): ?>
        <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <?php if ($action === 'fichar'): ?>
        <h2>Fichar jugador</h2>
        <form method="post" action="?action=fichar">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="number" name="dorsal" placeholder="Dorsal" min="1" max="99" required>
            <select name="posicion" required>
                <option value="Portero">Portero</option>
                <option value="Defensa">Defensa</option>
                <option value="Centrocampista">Centrocampista</option>
                <option value="Delantero">Delantero</option>
            </select>
            <input type="text" name="foto" placeholder="Nombre de archivo de foto (opcional)">
            <button type="submit">Fichar</button>
            <a class="button" href="?action=listar">Cancelar</a>
        </form>
    <?php elseif ($action === 'editar' && $jugador): ?>
        <h2>Editar jugador: <?php echo htmlspecialchars($jugador['nombre']); ?></h2>
        <form method="post" action="?action=editar&id=<?php echo (int)$jugador['id']; ?>">
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($jugador['nombre']); ?>" required>
            <input type="number" name="dorsal" value="<?php echo htmlspecialchars($jugador['dorsal']); ?>" min="1" max="99" required>
            <select name="posicion" required>
                <option value="Portero"        <?php echo $jugador['posicion'] === 'Portero' ? 'selected' : ''; ?>>Portero</option>
                <option value="Defensa"        <?php echo $jugador['posicion'] === 'Defensa' ? 'selected' : ''; ?>>Defensa</option>
                <option value="Centrocampista" <?php echo $jugador['posicion'] === 'Centrocampista' ? 'selected' : ''; ?>>Centrocampista</option>
                <option value="Delantero"      <?php echo $jugador['posicion'] === 'Delantero' ? 'selected' : ''; ?>>Delantero</option>
            </select>
            <input type="text" name="foto" value="<?php echo htmlspecialchars($jugador['foto']); ?>">
            <input type="number" name="goles" value="<?php echo htmlspecialchars($jugador['goles']); ?>" min="0">
            <button type="submit">Guardar cambios</button>
            <a class="button" href="?action=listar">Cancelar</a>
        </form>
    <?php else: ?>
        <h2>Plantilla actual</h2>
        <p>
            <a class="button" href="?action=fichar">+ Fichar nuevo jugador</a>
        </p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Dorsal</th>
                <th>Posición</th>
                <th>Goles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($jugadores): ?>
            <?php foreach ($jugadores as $j): ?>
                <tr>
                    <td><?php echo htmlspecialchars($j['id']); ?></td>
                    <td>
                        <?php
                        $foto = $j['foto'] ?: 'sin_foto.png';
                        ?>
                        <img src="assets/img/<?php echo htmlspecialchars($foto); ?>" alt="Foto jugador">
                    </td>
                    <td><?php echo htmlspecialchars($j['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($j['dorsal']); ?></td>
                    <td><?php echo htmlspecialchars($j['posicion']); ?></td>
                    <td><?php echo htmlspecialchars($j['goles']); ?></td>
                    <td class="acciones">
                        <a class="button" href="?action=editar&id=<?php echo (int)$j['id']; ?>">Editar</a>
                        <a class="button" href="?action=eliminar&id=<?php echo (int)$j['id']; ?>"
                           onclick="return confirm('¿Seguro que quieres dar de baja a este jugador?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay jugadores en la plantilla.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
