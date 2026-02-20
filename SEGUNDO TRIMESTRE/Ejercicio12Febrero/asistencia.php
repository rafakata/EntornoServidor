<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

require 'db.php';
include 'menu.php';

$sql="SELECT estado. COUNT(*) AS cantidad FROM asistencia GROUP BY horas";
$resultado=$conexion->query($sql);

$etiquetas = [];
$datos = [];

while($fila = $resultado->fetch_assoc()) {
    $etiquetas[] = $fila['estado'];
    $datos[] = $fila['cantidad'];
}
?>

<h1>Control de Asistencia</h1>
<div class="chart-container" style="position: relative; height:40vh; width:80vw">
    <div id="grafico">
        <canvas id="graficoAsistencia"></canvas>
    </div>

    <div style="padding: 20px;">
        <h3>Resumen Numérico:</h3>
        <ul>
            <?php foreach ($etiquetas as $i => $etiqueta): ?>
                <li><?= $etiqueta ?>: <?= $datos[$i] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoAsistencia').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($etiquetas) ?>,
            datasets: [{
                label: 'Cantidad de Asistencias',
                data: <?= json_encode($datos) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>