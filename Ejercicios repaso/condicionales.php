<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //CONDICIONALES
    //Comprobar si la nota de un estudiante es suficiente, notable o sobresaliente y mostrar el resultado.
    $nota=7;
    if($nota<=10&&$nota>=9){
        echo "Has sacado un sobresaliente.<br>";
    } else if($nota<9&&$nota>=7){
        echo "Has sacado un notable.<br>";
    } else if($nota<7&&$nota>=5){
        echo "Has sacado un suficiente.<br>";
    } else if($nota<5&&$nota>=0){
        echo "Has suspendido.<br>";
    } else {
        echo "La nota introducida no es válida.<br>";
    }

    //Usar una estructura switch para mostrar el día de la semana.
    $dia="Jueves";
    switch($dia){
        case "Lunes":
            echo "Hoy es lunes.<br>";
            break;
        case "Martes":
            echo "Hoy es martes.<br>";
            break;
        case "Miércoles":
            echo "Hoy es miércoles.<br>";
            break;
        case "Jueves":
            echo "Hoy es jueves.<br>";
            break;
        case "Viernes":
            echo "Hoy es viernes.<br>";
            break;
        case "Sábado":
            echo "Hoy es sábado.<br>";
            break;
        case "Domingo":
            echo "Hoy es domingo.<br>";
            break;
        default:
            echo "El día introducido no es válido.<br>";
    }

    //Comprobar la temperatura y mostrar un mensaje según el rango en el que se encuentre.
    $temperatura=-7;
    if($temperatura<0){
        echo "Hay $temperatura grados bajo cero.<br>";
    }elseif ($temperatura>=0 && $temperatura<=30){
        echo "La temperatura es normal,hay $temperatura grados.<br>";
    }else{
        echo "Hace mucho calor,hay $temperatura grados.<br>";
    }

    
    ?>
</body>
</html>