<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
include 'menu.php';
?>

<h1>Servicios</h1>
<p>En nuestra empresa, ofrecemos una amplia gama de servicios tecnológicos diseñados para satisfacer las necesidades de nuestros clientes. Desde el desarrollo de software personalizado hasta la consultoría en tecnología, nuestro equipo de expertos está comprometido a brindar soluciones innovadoras y eficientes.</p>
<p>Nuestros servicios incluyen:</p>
<ul>
    <li><strong>Desarrollo de Software:</strong> Creamos aplicaciones a medida que se adaptan a las necesidades específicas de tu negocio, utilizando las últimas tecnologías para garantizar un rendimiento óptimo.</li>
    <li><strong>Consultoría Tecnológica:</strong> Ofrecemos asesoramiento experto para ayudarte a tomar decisiones informadas sobre la implementación de tecnología en tu empresa, optimizando tus procesos y mejorando tu competitividad.</li>
    <li><strong>Soporte Técnico:</strong> Proporcionamos soporte continuo para garantizar que tus sistemas funcionen sin problemas, resolviendo cualquier problema técnico que pueda surgir de manera rápida y eficiente.</li>
    <li><strong>Capacitación:</strong> Ofrecemos programas de capacitación personalizados para tu equipo, ayudándoles a mantenerse actualizados con las últimas tendencias y tecnologías en el mercado.</li>
</ul>
<p>En nuestra empresa, nos esforzamos por ofrecer servicios de alta calidad que impulsen el éxito de nuestros clientes. Contáctanos hoy para descubrir cómo podemos ayudarte a alcanzar tus objetivos tecnológicos.</p>
