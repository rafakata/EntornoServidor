<?php
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Web Profesional PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .tabs {
            background-color: #333;
            overflow: hidden;
        }
        .tabs a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .tabs a:hover {
            background-color: #575757;
        }
        .tabs a.active {
            background-color: #04AA6D;
        }
        .container {
            padding: 20px;
        }
        .alert {
            padding: 15px;
            background-color: #f44336;
            color: white;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="tabs">
        <a href="index.php" class="<?php echo ($pagina_actual == 'index.php') ? 'active' : ''; ?>">Inicio</a>
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="quienes_somos.php" class="<?php echo ($pagina_actual == 'quienes_somos.php') ? 'active' : ''; ?>">Quiénes somos</a>
            <a href="servicios.php" class="<?php echo ($pagina_actual == 'servicios.php') ? 'active' : ''; ?>">Servicios</a>
            <a href="contacto.php" class="<?php echo ($pagina_actual == 'contacto.php') ? 'active' : ''; ?>">Contacto</a>

            <a href="asistencia.php" class="<?php echo ($pagina_actual == 'asistencia.php') ? 'active' : ''; ?>">Asistencia</a>
            <a href="logout.php" class="<?php echo ($pagina_actual == 'logout.php') ? 'active' : ''; ?>">Cerrar sesión</a>
        <?php endif; ?>
    </div>
</body>
</html>
