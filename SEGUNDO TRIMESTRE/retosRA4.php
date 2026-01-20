<?php

/*Reto 26*/
/*Misión 1*/
$dsn="sqlite".$host;

/*Misión 2*/
if (self::$instance === null) {
    self::$instance = new PDO("mysql:host=localhost;dbname=...;charset=utf8mb4","username","password");// 
}
return self::$instance;

/*Misión 3*/
?>