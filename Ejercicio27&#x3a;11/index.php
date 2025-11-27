<?php
include 'Tarea.php';

$tareas=[];
$tareas[] = new Tarea("Comprar pan", "Alta");
$tareas[] = new Tarea("Estudiar DWES", "Alta");
$tareas[] = new Tarea("Ver serie", "Baja");


if (isset($_POST['descripcion'])&& isset($_POST['prioridad'])){
    $tareaNueva=new Tarea($_POST['descripcion'],$_POST['prioridad']);
    $tareas[]=$tareaNueva;
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

    <table border="1" cellpadding="5" cellspacing="0">
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
                <td><a href="#">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>