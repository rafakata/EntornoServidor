<?php
session_start();

//COMPROBAMOS SI EL USUARIO YA ENVIÓ EL FORMULARIO
if($_POST){
    $usuario_valido="profe";
    $pass_valida="1234";
    $user=$_POST['usuario'];
    $pas=$_POST['pass'];

    //VERIFICAMOS LAS CREDENCIALES
    if($user === $usuario_valido && $pas == $pass_valida){
        $_SESSION['nombre_usuario'] = $user;
        $_SESSION['rol']="VIP";
        //Redirigimos a la web secreta vip
        header("Location: vip.php");
        exit();
    }else{
        $error="Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{font-family: sans-serif; text-align: center; margin-top: 50px;}
    form{display: inline-block; background: #fff; padding: 30px 40px; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.12); margin-top: 20px;}
    input[type="text"], input[type="password"]{display: block; width: 220px; margin: 15px auto; padding: 10px; border: 1px solid #bbb; border-radius: 5px; font-size: 1em; transition: border-color 0.2s;}
    input[type="text"]:focus, input[type="password"]:focus{border-color: #007bff; outline: none;}
    button{background: #007bff; color: #fff; border: none; padding: 10px 25px; border-radius: 5px; font-size: 1em; cursor: pointer; margin-top: 10px; transition: background 0.2s;}
    button:hover{background: #0056b3;}
    p[style]{margin-bottom: 20px; font-weight: bold;}
    body{background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);}
    </style>
</head>
<body>
    <?php if(isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <h2>Acceso a socio</h2>
    <form method="post" action="">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="pass" placeholder="Contraseña" required>
        <button type="submit">Iniciar sesión</button>
    </form>
    <br>
    <a href="index.php"><button style="background: #28a745;">Volver a la página principal</button></a>
</body>
</html>