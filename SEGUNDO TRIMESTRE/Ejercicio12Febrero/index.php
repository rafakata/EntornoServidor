<?php
session_start();
require 'db.php';

$mensaje_error="";

if (isset($_POST['btn_login'])){
    $identificador=$conexion->real_escape_string($_POST['identificador']);
    $password_plano=$_POST['password'];
    $password_hash=md5($password_plano);

    $sql="SELECT * FROM usuarios 
    WHERE (usuario='$identificador' OR email='$identificador') 
    AND password='$password_hash'";

    if($resultado=$conexion->query($sql)){
        if ($resultado->num_rows>0){
            $fila=$resultado->fetch_assoc();
            $_SESSION['ultima_visita']=$fila['ultima_visita'];
            $_SESSION['usuario']=$fila['usuario'];
            $conexion->query("UPDATE usuarios SET ultima_visita=NOW() WHERE id=".$fila['id']);
            header("Location: index.php");
            exit();
        }else{
            $mensaje_error="Usuario o contraseña incorrectos";
        }
    }else{
        $mensaje_error="Error en la consulta: " . $conexion->error;
    }
}

include 'menu.php';
 ?>
 <?php if (isset($_SESSION['usuario'])): ?>
        <center>
            <h1>Bienvenido al Panel de Gestión</h1>
            <p>Hola <strong><?php echo $_SESSION['usuario']; ?></strong>.</p>
            <p>Tu última visita fue el:
                <strong>
                <?php
                    $fecha = strtotime($_SESSION['ultima_visita']);
                    echo date("d/m/Y", $fecha) . " a las " . date("H:i", $fecha);
                ?>
                </strong>
            </p>
            <hr>
         
        </center>
  <?php else:?>
    <h1>Acceso restringido</h1>
    <p>Por favor, inicia sesión para acceder al panel de gestión.</p> 
    
    <?php if ($mensaje_error):?>
        <div class="alert alert-danger" role="alert">
            <?php echo $mensaje_error; ?>
        </div>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <div class="mb-3">
            <label for="identificador" class="form-label">Usuario o Email</label>
            <input type="text" class="form-control" id="identificador" name="identificador" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="btn_login" class="btn btn-primary">Iniciar Sesión</button>
    </form>
  <?php endif; ?>