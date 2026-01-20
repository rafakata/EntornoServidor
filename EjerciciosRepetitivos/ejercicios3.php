<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //Ejercicio 3.1: La Lista de Tareas (Array Simple)(tareas.php)
    $tareas=["Compra pan","Estudiar PHP","Hacer ejercicio"];
    $tareas[]="Dormir";
    echo "<ul>";
    foreach ($tareas as $tarea){
        echo "<li>$tarea</li>";
    }
    echo "</ul>";

    //Ejercicio 3.2: Capitales del Mundo (Array Asociativo) (paises.php)
    $paises=[
        "España"=>"Madrid",
        "Francia"=>"París",
        "Italia"=>"Roma"
    ];
    foreach ($paises as $pais=>$capital){
        echo "<p>La capital de $pais es $capital.</p>";
    }

    //Ejercicio 3.3: La Matriz de Números (Array Multidimensional) (nota.php)
    $clase=[
        ["nombre"=>"Ana","nota"=>8],
        ["nombre"=>"Luis","nota"=>4],
    ];
    foreach ($clase as $alumno){
        if ($alumno["nota"]>=5){
            echo "<p>".$alumno["nombre"]." ha aprobado con un ".$alumno["nota"].".</p>";
        }else{
            echo "<p>".$alumno["nombre"]." ha suspendido con un ".$alumno["nota"].".</p>";
        }
    }
    ?>
</body>
</html>