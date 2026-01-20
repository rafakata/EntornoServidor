<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Coche{
        public $color="verde";
    }
    $miCoche=new Coche();
    $miCoche->color="rojo";
    echo $miCoche->color;

    class Coche2{
        private $color="verde";
    }
    $miCoche2=new Coche2();
    $miCoche2->color="rojo"; // Da error al ser private
    echo $miCoche2->color;
    ?>
</body>
</html>