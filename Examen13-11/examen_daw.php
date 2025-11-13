<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Servidor-Rafael Medina Quelle</title>
    <!-- https://github.com/rafakata/EntornoServidor.git -->
</head>
<body>
    
</body>
<?php 
$nombre_alumno="Rafael Medina Quelle";                                  //Declaro variable de mi nombre (String).
$modulo="Desarrollo Web en Entorno Servidor";                           //Declaro variable del módulo (String).
$nota_media=7.5;                                                        //Declaro variable de mi nota media (float por tener decimales).
$es_matriculado=true;                                                   //Declaro variable booleana de si estoy matriculado o no.

echo "<h1>$nombre_alumno</h1>";                                         //Con comillas dobles, muestro la variable de mi nombre con un h1.
echo "<h2>$modulo</h2>";                                                //Con comillas dobles, muestro la variable del módulo con un h2.
echo "<p> Mi nota media actual es: $nota_media</p>";                    //Con comillas dobles, muestro la variable de mi nota media dentro de un párrafo.
echo '<p> Mi nota media actual es: $nota_media</p>';                    //Con las comillas simples, se muestra literalmente lo que se introduce. Es decir, no se interpreta la variable

//Bucle if para mostrar la calificación.
if($nota_media>=9&&$nota_media<=10){                                    //Aquí controlo que la nota Sobresaliente debe ser mayor o igual que 9 PERO menor o igual que 10. No puede haber notas mayores que 10.
    echo "Sobresaliente<br>";                                           //Imprimimos Sobresaliente. A diferencia de los otros echo anteriores. En vez de imprimirlo con un párrafo, usamos <br> para hacer un salto de línea
}elseif($nota_media>=7&&$nota_media<9){                                 //Aquí controlo que la nota Notable debe ser mayor o igual que 7 PERO menor que 9.
    echo "Notable<br>";                                                 //Imprimimos Notable con un salto de línea.
}elseif($nota_media>=5&&$nota_media<7){                                 //Aquí controlo que la nota Aprobado debe ser mayor o igual que 5 PERO menor que 7.
    echo "Aprobado<br>";                                                //Imprimimos Aprobado con un salto de línea.
}elseif ($nota_media <5){                                               //Aquí controlo que la nota Suspenso debe ser menor que 5.
    echo "Suspenso<br>";                                                //Imprimimos Suspenso con un salto de línea.
}else{                                                                  //Aquí no hace falta condición porque si no se cumple ninguna de las anteriores, es que la nota es inválida.
    echo "No se puede sacar más de un 10. 
    Revise la nota media introducida.<br>";                             //Aquí recalco y aviso de que ha de haber un fallo en la nota media introducida.
}

if($es_matriculado){                                                    //Bucle if para comprobar el boolean de si el alumno está matriculado.
    echo "<p>Estado: Alumno matriculado.</p>";                          //Si es true, imprime que estoy matriculado.
}else{                                                                  //No hace falta condición porque si no es true, es false, no hay más opción.
    echo "<p>Paga la matrícula ya, tieso.</p>";                         //Aquí pongo una pequeña broma para que quede claro que esto lo he hecho yo y que tengo claro lo que estoy haciendo.
}

echo "<table border=1>";                                                //Iniciamos la tabla y le añadimos "border=1" para que se vean los bordes.
$i=1;                                                                   //Iniciamos el contador que usaremos en el bucle while.
while($i<=5){                                                           //Comenzamos el bucle while con la condición de que se repita mientras que i sea menor o igual que 5.
    echo "<tr>";                                                        //Iniciamos la fila de la tabla.
    echo "<td>Fila número: </td>";                                      //Creamos la primera celda de la fila.
    echo "<td>$i</td>";                                                 //Creamos la segunda celda que mostrará el número de fila que se irá actualizando cada vez que se repita el bucle gracias al incremnento que veremos después.
    echo "</tr>";                                                       //Cerramos la fila.
    $i++;                                                               //Aquí está el incremento del contrador.
}
echo "</table>"                                                         //Cerramos la tabla.

?>
</html>