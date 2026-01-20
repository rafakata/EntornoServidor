<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //Ejercicio 2.1: El Portero Automático (IF) (acceso.php)
    $usuario = "admin";
    $nivel=1;
    if ($usuario == "admin"&&$nivel>0){
        echo "Acceso Total<br>";
    }else{
        echo "Acceso Restringido<br>";
    }

    $usuario = "invitado";
    $nivel=0;
    if ($usuario == "admin"&&$nivel>0){
        echo "Acceso Total<br>";
    }else{
        echo "Acceso Restringido<br>";
    }

    //Ejercicio 2.2: El Dado Virtual (SWITCH) (dado.php)
    $dado=rand(1,6);
    switch ($dado){
        case 1:
            echo "Pifia<br>";
            break;
        case 6:
            echo "Crítico<br>";
            break;
        default:
            echo "Tirada normal<br>";
            break;
    }

    //Ejercicio 2.3: La Tabla de Multiplicar (WHILE) (tabla5.php)
    $numero=5;
    $i=1;
    while ($i<=10){
        echo "$numero x $i = ".($numero*$i)."<br>";
        $i++;
    }
    ?>
</body>
</html>