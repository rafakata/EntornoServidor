<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "empresa_db";

$conexion=new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    echo("La conexion ha fallado: " . $conexion->connect_error);
    exit();
}

$conexion->set_charset("utf8");

$sql = "SELECT ID, NOMBRE, APELLIDOS, CARGO, EMAIL FROM empleados";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Cargo</th><th>Email</th></tr>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['ID'] . "</td>";
            echo "<td>" . $fila['NOMBRE'] . "</td>";
            echo "<td>" . $fila['APELLIDOS'] . "</td>";
            echo "<td>" . $fila['CARGO'] . "</td>";
            echo "<td>" . $fila['EMAIL'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron registros.";
    }

    $conexion->close();
    ?>
</body>
</html>