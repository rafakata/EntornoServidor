<?php
session_start();
//COMPROBAMOS SI EXISTE O NO LA VARIABLE SESIÓN
if(!isset($_SESSION['nombre_usuario'])){
    header("Location: login.php");
    exit(); 
}


if(!isset($_SESSION['contador'])){
    $_SESSION['contador']=1;
}else{
    $_SESSION['contador']++;
}

$nombre=$_SESSION['nombre_usuario'];
$rol=$_SESSION['rol'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club VIP</title>
    <style>
        body{font-family: sans-serif; text-align: center; margin-top: 50px;}
        .card{display: inline-block; background: #fff; padding: 30px 40px; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.12); margin-top: 20px;}
        hr{margin: 20px 0;}
        body{background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);}
    </style>
</head>
<body>
    <div class="card">
        <h1>Bienvenido a la zona VIP</h1>
        <p>Hola <?php echo $nombre; ?>, eres un socio VIP</p>
        <p>Tu estatus en el servidor es <?php echo $rol; ?></p>
        <hr>
        <p>Esta información sólo puede verla rodrigo</p>
        <p>Has visitado esta página <?php echo $_SESSION['contador']; ?> veces.</p>
        <br>
        <a href="index.php"><button style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Volver a la página principal</button></a>
    </div>
</body>
</html>
