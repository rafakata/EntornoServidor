<?php
// =================================================================
// B A C K E N D   (Espacio para el alumno)
// =================================================================
// 1. Estructura de Datos: Array Multidimensional Asociativo [cite: 9]
$inventario = [
    ['id' => 1, 'categoria' => 'Audio', 'nombre' => 'Auriculares', 'precio' => 29.99, 'stock' => 10],
    ['id' => 2, 'categoria' => 'Video', 'nombre' => 'Monitor', 'precio' => 199.99, 'stock' => 3],
    ['id' => 3, 'categoria' => 'Cables', 'nombre' => 'Cable', 'precio' => 9.99, 'stock' => 15],
    ['id' => 4, 'categoria' => 'Periféricos', 'nombre' => 'Ratón', 'precio' => 15.50, 'stock' => 2],
];
// Variable para controlar qué lista mostrar (si la completa o la filtrada)
$productos_a_mostrar = $inventario;
$mensaje = "";
// 2. Funciones Personalizadas (Modularidad) [cite: 10]
/**
* Función para Insertar un nuevo producto.
* REQUISITO: Paso por referencia para modificar el array original 
*/
function agregarProducto(&$lista, $nombre, $categoria, $precio, $cantidad) {
    // 1. Validar que el precio no sea negativo y que el nombre no esté vacío [cite: 7].
    if ($precio < 0) {
        return "Error: El precio no puede ser negativo.";
    }
    if (trim($nombre) === "") {
        return "Error: El nombre no puede estar vacío.";
    }
    // 2. Crear el nuevo array asociativo del producto.
    $nuevo_id = count($lista) > 0 ? end($lista)['id'] + 1 : 1;
    $nuevo_producto = [
        'id' => $nuevo_id,
        'categoria' => $categoria,
        'nombre' => $nombre,
        'precio' => $precio,
        'stock' => $cantidad,
    ];
    // 3. Añadirlo al array original ($lista).
    $lista[] = $nuevo_producto;
    return "";
}
/**
* Función para Buscar productos.
* REQUISITO: Filtrar por nombre sin distinguir mayúsculas/minúsculas [cite: 5]
*/
function buscarProducto($lista, $termino) {
    $resultado = [];
    $termino_minuscula = mb_strtolower($termino);
    foreach ($lista as $producto) {
        $nombre_minuscula = mb_strtolower($producto['nombre']);
        if (strpos($nombre_minuscula, $termino_minuscula) !== false) {
            $resultado[] = $producto;
        }
    }
    return $resultado; // Retorna el array filtrado con coincidencias
}
// 3. Lógica del Formulario (Procesar POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // A) Si el usuario pulsó "Añadir al Inventario" [cite: 23]
    if (isset($_POST['accion']) && $_POST['accion'] === 'insertar') {
        $nombre = $_POST['nombre'] ?? "";
        $categoria = $_POST['categoria'] ?? "Audio";
        $precio = floatval($_POST['precio'] ?? 0);
        $cantidad = intval($_POST['cantidad'] ?? 0);
        $mensaje = agregarProducto($inventario, $nombre, $categoria, $precio, $cantidad);
    }
    // B) Si el usuario pulsó "Filtrar Lista" [cite: 19]
    if (isset($_POST['accion']) && $_POST['accion'] === 'buscar') {
        $termino = $_POST['termino'] ?? "";
        if (trim($termino) !== "") {
            $productos_a_mostrar = buscarProducto($inventario, $termino);
        } else {
            $productos_a_mostrar = $inventario;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ElectroShop Gestión</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h1 { text-align: center; color: #333; margin-bottom: 30px; }
        .container { max-width: 1000px; margin: 0 auto; }
        /* Grid para los formularios */
        .forms-container { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .card h3 { margin-top: 0; color: #0056b3; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        input, select { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        /* Botones */
        .btn { width: 100%; padding: 10px; border: none; border-radius: 4px; color: white; font-weight: bold; cursor: pointer; }
        .btn-blue { background-color: #0056b3; }
        .btn-green { background-color: #28a745; }
        .btn-blue:hover { background-color: #004494; }
        .btn-green:hover { background-color: #218838; }
        .link-reset { display: block; text-align: center; margin-top: 10px; color: #0056b3; text-decoration: none; }
        /* Tabla */
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #333; color: white; }
        /* Estilos de Alerta  */
        .alerta-stock { color: red; font-weight: bold; background-color: #ffeeee; }
    </style>
</head>
<body>
<div class="container">
    <h1>⚡ ElectroShop Gestión</h1>
    <div class="forms-container">
        <div class="card">
            <h3>🔍 Buscar Producto</h3>
            <form method="POST" action="">
                <input type="hidden" name="accion" value="buscar">
                <label>Nombre del producto:</label>
                <input type="text" name="termino" placeholder="Ej: Monitor...">
                <button type="submit" class="btn btn-blue">Filtrar Lista</button>
                <a href="" class="link-reset">Ver Todos</a>
            </form>
        </div>
        <div class="card">
            <h3>➕ Nuevo Ingreso</h3>
            <form method="POST" action="">
                <input type="hidden" name="accion" value="insertar">
                <label>Nombre Producto:</label>
                <input type="text" name="nombre" required>
                <label>Categoría:</label>
                <select name="categoria">
                    <option value="Audio">Audio</option>
                    <option value="Video">Video</option>
                    <option value="Cables">Cables</option>
                    <option value="Periféricos">Periféricos</option>
                </select>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <input type="number" name="precio" step="0.01" placeholder="Precio €" required>
                    <input type="number" name="cantidad" placeholder="Cant." required>
                </div>
                <button type="submit" class="btn btn-green">Añadir al Inventario</button>
            </form>
            <?php if($mensaje): ?>
                <p style="color: red; text-align: center;"><?php echo $mensaje; ?></p>
            <?php endif; ?>
        </div>
    </div>
    <h3>📦 Inventario Actual</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Bucle para mostrar productos con alerta de stock si stock < 5 [cite: 4]
            foreach ($productos_a_mostrar as $producto) {
                $clase_stock = ($producto['stock'] < 5) ? 'alerta-stock' : '';
                echo "<tr>";
                echo "<td>".$producto['id']."</td>";
                echo "<td>".$producto['categoria']."</td>";
                echo "<td>".$producto['nombre']."</td>";
                echo "<td>".$producto['precio']." €</td>";
                if ($producto['stock'] < 5) {
                    echo "<td class='$clase_stock'>".$producto['stock']." (Reponer)</td>";
                } else {
                    echo "<td>".$producto['stock']."</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>