<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$mensaje="";
if(isset($_POST['enviar'])) {
    $mensaje="¡Gracias ".$_SESSION['usuario'].", tu mensaje ha sido enviado!";
}

include 'menu.php';
?>

<h1>Formulario de Contacto</h1>
<?php if ($mensaje): ?>
    <p><?= $mensaje ?></p>
<?php endif; ?>

<form method="post" action="contacto.php">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="email">Correo Electrónico:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mensaje">Mensaje:</label><br>
    <textarea id="mensaje" name="mensaje" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" name="enviar" value="Enviar">
</form>
