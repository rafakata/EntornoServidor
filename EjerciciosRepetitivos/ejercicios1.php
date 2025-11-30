<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //Ejercicio 1.1: El Perfil Usuario (perfil.php)
    $nombre = "Juan";
    $apellido = "Pérez";
    $edad = 30;
    $email = "juan.perez@example.com";
    echo "<p>El usuario $nombre $apellido tiene $edad años. Contacto: $email.</p>";

    //Ejercicio1.2: El Conversor de Moneda (moneda.php)
    $euros = 50;
    $tasaDolar=1.08;
    $dolares = $euros * $tasaDolar;
    echo "<p>$euros euros son $dolares dólares.</p>";

    //Ejercicio 1.3: Corrector de Textos (texto.php)
    $mensaje="Hola mundo";
    $mensaje=trim($mensaje);
    $mensaje=strtoupper($mensaje);
    echo "<p>$mensaje</p>";
    ?>
</body>
</html>