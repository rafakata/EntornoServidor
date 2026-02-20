<?php
//db.php modificado para puerto distinto
$host="localhost";
$usuario_db="root";
$password_db="";
$nombre_db="curso_cesur";
$puerto="3306"; //Pon aquí el puerto que diga tu xampp

//Añadimos el puerto al final de la conexión
$conexion=new mysqli ($host, $usuario_db, $password_db, $nombre_db, $puerto);

if ($conexion->connect_error){
    die("Fallo de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
?>