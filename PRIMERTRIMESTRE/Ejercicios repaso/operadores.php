<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //OPERADORES
    //Comprobar si un número es par o impar y mostrar el resultado.
    $num=256;
    if($num % 2 == 0){
        echo "El número $num es par.<br>";
    } else {
        echo "El número $num es impar.<br>";
    }

    //Comprobar si uno es mayor que otro y mostrar el resultado.
    $n1=51;
    $n2=32;
    if($n1 > $n2){
        echo "El número $n1 es mayor que $n2.<br>";
    } else if($n1 < $n2){
        echo "El número $n2 es mayor que $n1.<br>";
    } else {
        echo "Los números son iguales.<br>";
    }

    //Usa operadores lógicos para comprobar si un número está entre dos valores y mostrar el resultado.
    $edad=25;
    if ($edad >=18 && $edad <=65){
        echo "La persona tiene $edad años. Puede trabajar porque está entre los 18 y 65 años.<br>";
    } else {
        echo "La persona tiene $edad años. No puede trabajar porque no está entre los 18 y 65 años.<br>";
    }
    ?>
</body>
</html>