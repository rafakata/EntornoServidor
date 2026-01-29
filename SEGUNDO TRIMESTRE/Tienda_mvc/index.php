<!DOCTYPE html>
<html>
    <head>
        <title>Inventario de tienda</title>
    </head>
    <body>
        <h1>Gestión de Productos</h1>
        <a href="crear.php">+ Añadir Producto</a>
        <hr>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            <?php
            include "dbTienda.php";
            $tienda=new dbTienda();
            $lista=$tienda->listarProductos();
            foreach ($lista as $producto){
                echo"<tr>";
                echo"<td>".$producto['id']."</td>";
                echo"<td>".$producto['nombre']."</td>";
                echo"<td>".$producto['precio']."</td>";
                echo"<td>".$producto['stock']."</td>";
            }        
            echo "<td>";
            echo "<a href='editar.php?id=".$producto['id']."'>Editar</a> ";
            echo "<a href='borrar.php?id=".$producto['id']."'>Borrar</a>";
            ?>
        </table>
    </body>
</html>