<?php
session_abort();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
include 'menu.php';
?>

<h1>Quiénes somos</h1>

<div style="display: flex; gap: 20px;">
    <div style="flex: 1; background-color: #fff; padding: 20px; border-radius: 5px;">
        <h2>Nuestra Misión</h2>
        <p>En nuestra empresa, nos dedicamos a proporcionar soluciones tecnológicas innovadoras que faciliten la vida de nuestros clientes. Nuestra misión es ser líderes en el mercado ofreciendo productos de alta calidad y un servicio excepcional.</p>
    </div>
    <div style="flex: 1; background-color: #fff; padding: 20px; border-radius: 5px;">
        <h2>Nuestro Equipo</h2>
        <p>Contamos con un equipo de profesionales altamente capacitados y apasionados por la tecnología. Nuestro equipo trabaja en conjunto para desarrollar productos que superen las expectativas de nuestros clientes y contribuyan al éxito de sus negocios.</p>
    </div>
</div>