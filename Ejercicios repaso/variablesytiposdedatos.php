<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //DEFINIR VARIABLES DE DISTINTOS TIPOS DE DATOS Y MOSTRARLOS
    //Define 3 variables y mostrar su contenido por pantalla.
    $nombre="Sofia";
    $edad=24;
    $ciudad="Torrejón de Ardoz";

    echo "Nombre: $nombre <br>";
    echo "Edad: $edad <br>";
    echo "Ciudad: $ciudad <br>";

    //Convertir un número decimal a entero y mostrar el resultado.
    $numdecimal=5.67; 
    $entero = (int)$numdecimal;
    echo "Número decimal: $numdecimal <br>";
    echo "Número entero (convertido): $entero <br>";

    //Realizar una operación matemática entre dos números y mostrar el resultado.
    $n1=10;
    $n2=3;
    $resultado=$n1/$n2;
    echo "La suma de $n1 y $n2 es: $resultado <br>";

    //Definir una variable booleana y mostrar su valor.
    $boolean=true;
    echo "Valor booleano: $boolean <br>";
    var_dump($boolean);

    //Definir una variable de tipo string y mostrar su longitud, además de convertirla a mayúsculas y minúsculas.
    $palabra="Externocleomastoideo";
    echo "<br> La palabra $palabra tiene ".strlen($palabra)." caracteres.<br>";
    echo "La palabra en mayúsculas es: ".strtoupper($palabra)."<br>";
    echo "La palabra en minúsculas es: ".strtolower($palabra)."<br>";

    //Crea una frase con variables interpoladas.
    echo "El nombre de la persona es $nombre y tiene $edad años.";

    //Define un array con varios nombres y muestra cada uno de ellos en una línea diferente.
    $nombres=["Ana", "Luis", "María"];
    echo "<br>Los nombres en el array son: <br>";
    foreach($nombres as $n){
        echo "$n.<br>";
    }
    ?>
</body>
</html>