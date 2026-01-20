<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio25/11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Boletín de Calificaciones-2ºDAW</h1>
    <?php
//Array para almacenar los datos de los alumnos
$clase = [
    [
    "nombre"=>"Rafael Medina Quelle",
    "grupo"=>"A",
    "notas"=>[
        "DWECL"=>10,
        "DWES"=>10,
        "Despliegue"=>10,
    ]
    ],
    [
    "nombre"=>"Ana López García",
    "grupo"=>"A",   
    "notas"=>[
        "DWECL"=>8,
        "DWES"=>7,
        "Despliegue"=>9,
    ]
    ],
    [
    "nombre"=>"Luis Martínez Pérez",
    "grupo"=>"B",
    "notas"=>[
        "DWECL"=>4,
        "DWES"=>5,
        "Despliegue"=>3,
    ]
    ],
    [
    "nombre"=>"Marta Sánchez Ruiz",
    "grupo"=>"B",
    "notas"=>[
        "DWECL"=>3,
        "DWES"=>6,
        "Despliegue"=>5,
    ]
    ],
];

//Función para calcular la media y limitarla a 2 decimales
function calcularMedia($notas){
    $media = array_sum($notas)/count($notas);
    return round($media, 2);
}

//Función para determinar si promociona o no además de que no puede tener notas inferiores a 4
function promociona($notas,$media){
    if ($media<5){
        return false;
    }
    foreach ($notas as $nota){
        if ($nota<4){
            return false;
        }
    }
    return true;
}

//Generar tabla
echo "<table>";
echo "<thead><tr>";
echo "<th>Nombre</th>";
echo "<th>Grupo</th>";
echo "<th>DWECL</th>";
echo "<th>DWES</th>";
echo "<th>Despliegue</th>";
echo "<th>Media</th>";
echo "<th>Promociona</th>";
echo "</tr></thead>";
echo "<tbody>";

foreach ($clase as $alumno) {
  $media = calcularMedia($alumno["notas"]);
  $aprueba = promociona($alumno["notas"], $media);
  $claseFila = $aprueba ? "aprobado" : "suspenso";
  echo "<tr class='$claseFila'>";
  echo "<td>" . $alumno["nombre"] . "</td>";
  echo "<td>" . $alumno["grupo"] . "</td>";
  echo "<td>" . $alumno["notas"]["DWECL"] . "</td>";
  echo "<td>" . $alumno["notas"]["DWES"] . "</td>";
  echo "<td>" . $alumno["notas"]["Despliegue"] . "</td>";
  echo "<td>" . $media . "</td>";
  echo "<td>" . ($aprueba ? "SÍ" : "NO") . "</td>";
  echo "</tr>";
}
echo "</tbody></table>";
?>
</body>
</html>