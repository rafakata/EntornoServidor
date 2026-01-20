<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "pruebaentornoservidor";

$conexion=new mysqli($servidor, $usuario, $password, $baseDatos);

if($conexion->connect_error){
    echo("La conexion ha fallado: " . $conexion->connect_error);
    exit();
}

$conexion->set_charset("utf8");


$sql = "SELECT ID,NOMBRE,APELLIDO1,APELLIDO2,EMAIL FROM alumnos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2 style="text-align:center;">👥 Usuarios Registrados</h2>

<?php
// ==========================================
// 5. MOSTRAR LOS DATOS (El Bucle)
// ==========================================

// Primero preguntamos: ¿Ha vuelto alguna fila?
if ($resultado->num_rows > 0) {

    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Email</th></tr>";

    // EL BUCLE WHILE (La parte más importante)
    // fetch_assoc() hace dos cosas:
    // 1. Saca la siguiente fila de la caja de resultados.
    // 2. La convierte en un ARRAY ASOCIATIVO ($fila['nombre']).
    // Cuando se acaban las filas, devuelve FALSE y el bucle termina.
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['ID'] . "</td>";
        echo "<td>" . $fila['NOMBRE'] . "</td>";
        echo "<td>" . $fila['APELLIDO1'] . "</td>";
        echo "<td>" . $fila['APELLIDO2'] . "</td>";
        echo "<td>" . $fila['EMAIL'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center'>No hay usuarios en la base de datos.</p>";
}

// ==========================================
// 6. CERRAR CONEXIÓN (Limpieza)
// ==========================================
// Siempre es buena práctica cerrar lo que abres para liberar memoria en el servidor.
$conexion->close();
?>

</body>
</html>