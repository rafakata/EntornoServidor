<?php
include "dbTienda.php";
$tienda=new dbTienda();
if (isset($_POST['editar'])){
    $tienda->actualizar($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['stock']);
    header("Location: index.php");
    exit();
}
if (isset($_GET['id'])){
    $id_producto=$_GET['id'];
    $producto=$tienda->buscarPorId($id_producto);
    if ($producto === null) {
        echo "<p>Producto no encontrado.</p>";
        echo '<a href="index.php">Volver al Inventario</a>';
        exit();
    }
}else{
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Editar Producto</title>
    </head>
    <body>
        <h1>Editar Producto</h1>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>
            <label>Precio:</label><br>
            <input type ="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" ><br>
            <label>Stock:</label><br>
            <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" ><br>
            <input type="submit" name="editar" value="Guardar">
        </form>    
        <a href="index.php">Volver al Inventario</a>
    </body>
</html>