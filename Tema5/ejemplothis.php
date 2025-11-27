<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class ClaseSencilla{
        public $var="Soy una variable de clase";

        public function muestraVar(){
            echo $this->var;
        }

        public function muestraVar1(){
            echo $var;
        }
    }
    ?>
</body>
</html>