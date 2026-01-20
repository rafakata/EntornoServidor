<?php
include 'Tarea.php';

$tareas=[];
$tareas[] = new Tarea("Comprar pan", "Alta");
$tareas[] = new Tarea("Estudiar DWES", "Alta");
$tareas[] = new Tarea("Ver serie", "Baja");


if (isset($_POST['descripcion']) && isset($_POST['prioridad'])) {
    $descripcion = trim($_POST['descripcion']);
    $prioridad   = $_POST['prioridad'];

    if ($descripcion != "") {
        $tareaNueva = new Tarea($descripcion, $prioridad);
        $tareas[]   = $tareaNueva;
    }
}

if (isset($_GET['eliminar'])) {
    $id = (int) $_GET['eliminar'];

    if (isset($tareas[$id])) {
        unset($tareas[$id]);                 
        $tareas = array_values($tareas);     
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Tareas</h1>

   <form method="post" action="index.php">
        Descripción:
        <input type="text" name="descripcion">
        Prioridad:
        <select name="prioridad">
            <option value="Alta">Alta</option>
            <option value="Baja">Baja</option>
        </select>
        <input type="submit" value="Añadir Tarea">
    </form>

    <br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Prioridad</th>
            <th>Acción</th>
        </tr>

   <?php foreach ($tareas as $id => $tarea) { ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $tarea->descripcion; ?></td>
                <td><?php echo $tarea->prioridad; ?></td>
                <td><a href="index.php?eliminar=<?php echo $id; ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>