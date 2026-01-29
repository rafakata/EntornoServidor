<?php
if (isset($_POST['guardar'])){
    include "dbTienda.php";
    $tienda=new dbTienda();
    $tienda->insertarProducto($_POST['nombre'], $_POST['precio'], $_POST['stock']);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Nuevo Producto</title>
    </head>
    <body>
        <h1>Nuevo Producto</h1>
        <form action="crear.php" method="POST">
            <label>Nombre:</label><br>
            <input type="text" name="nombre" required><br>
            <label>Precio:</label><br>
            <input type ="number" step="0.01" name="precio" required><br>
            <label>Stock:</label><br>
            <input type="number" name="stock" required><br>
            <input type="submit" name="guardar" value="Guardar">
        </form>    
        <a href="index.php">Volver al Inventario</a>
    </body>