<?php
session_start();

require_once 'config/db_config.php';
require_once 'helpers/Util.php';
require_once 'models/Coche.php';
require_once 'models/Usuario.php';
require_once 'models/Taller.php';
require_once 'models/Empleado.php';

$seccion=isset($_GET['seccion'])?$_GET['seccion']:'dashboard';
if ($seccion=='login'){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $usuarioModel=new Usuario();
        $login=$usuarioModel->login($_POST['email'], $_POST['password']);
        if($login){
            $_SESSION['usuario']=$login;
            header("Location: index.php");
            exit();
        } else {
           $error="Usuario o contraseña incorrectos.";
           include 'views/auth/login.php';
           exit();
        }
    }
}

if ($seccion=='logout'){
    session_destroy();
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['usuario'])){
    include 'views/auth/login.php';
    exit();
}

include 'views/layout/header.php';

switch($seccion){
    case 'admin_usuarios':
        if ($_SESSION['usuario']['rol']!='admin'){
            die("Acceso denegado.");
        }
        $uModel=new Usuario();
        $usuarios=$uModel->getTodos();
        include 'views/admin/gestion_usuarios.php';
        break;
    case 'crear_usuario':
        if($_SESSION['usuario']['rol']!='admin'){
            die("Acceso denegado.");
        }
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $uModel=new Usuario();
           $uModel->crear($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['rol']);
           echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        }
        break;
    case 'borrar_usuario':
        if($_SESSION['usuario']['rol']!='admin'){
            die("Acceso denegado.");
        }
        if (isset($_GET['id'])){
            $uModel=new Usuario();
            $uModel->borrar($_GET['id']);
            echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        }
        break;
    case 'empleados':
        $rrhh=new Empleado();
        $listaEmpleados=$rrhh->getTodos();
        $gastoTotal=$rrhh->getGastoTotalSueldos();
        include 'views/empleados/equipo.php';
        break;
    case 'crear_empleado':
        include 'views/empleados/crear.php';
        break;
    case 'guardar_empleado':
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $rrhh=new Empleado();
            $rrhh->insertar($_POST['nombre'], $_POST['cargo'], $_POST['email'], $_POST['sueldo']);
            echo "<script>window.location='index.php?seccion=empleados';</script>";
        }
        break;
    case 'taller':
        $taller=new Taller();
        $listaCitas=$taller->getCitasActivas();
        include 'views/taller/dashboard_taller.php';
        break;
    case 'coches':
        $ventas=new Coche();
        $listaCoches=$ventas->getTodos();
        include 'views/coches/listado.php';
        break;
    case 'dashboard':
        default:
         $modeloCoches=new Coche();
         $modeloTaller=new Taller();
         $modeloRRHH=new Empleado();
         $totalCoches=count($modeloCoches->getTodos());
         $vipCoches=count($modeloCoches->getDestacados());   
         $citasPendientes=count($modeloTaller->getCitasActivas());
         $totalEmpleados=count($modeloRRHH->getTodos());
        include 'views/dashboard/main.php';
        break; 
}
include 'views/layout/footer.php';
?>