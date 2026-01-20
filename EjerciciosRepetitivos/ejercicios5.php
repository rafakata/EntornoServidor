<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //5.1: Generador de Cartas de Jugador (juego.php)
    class Jugadr{
        private $apodo;
        private $puntos;

        public function __construct($apodo,$puntos){
            $this->apodo=$apodo;
            $this->puntos=$puntos;
        }

        public function getInfo(){
            return "Jugador: ".$this->apodo." - Puntos: ".$this->puntos;
        }
    }
    $equipo=[];
    $equipo[]=new Jugadr("El Rápido",30);
    $equipo[]=new Jugadr("El Fuerte",25);
    $equipo[]=new Jugadr("El Listo",20);

    echo "<ul>";
    foreach ($equipo as $jugador){
        echo "<li>".$jugador->getInfo()."</li>";
    }
    echo "</ul>";

    //5.2: El login Simulado (login.php)
    $baseDeDatos=["admin"=>"1234","user"=>"0000"];
    $usuarioInput="admin";
    $passInput="1234";

    if(isset($baseDeDatos[$usuarioInput])){
        if($baseDeDatos[$usuarioInput]==$passInput){
            echo "<h1>Bienvenido!</h1>";
        }else{
            echo "<h3>Contraseña incorrecta</h3>";
        }
    }else{
        echo "<h3>Usuario no encontrado</h3>";
    }
    ?>
</body>
</html>