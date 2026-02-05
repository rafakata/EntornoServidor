<?php
// =======================================================
// 0. CHIVATO DE ERRORES (Solo para desarrollo)
// =======================================================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. INICIAR SESIÓN
session_start();

// 2. CARGA DE DEPENDENCIAS
// Usa __DIR__ para asegurar que encuentra los archivos siempre
require_once __DIR__ . '/config/db_conf.php';
require_once __DIR__ . '/helpers/Util.php';
require_once __DIR__ . '/models/Coche.php';
require_once __DIR__ . '/models/Taller.php';
require_once __DIR__ . '/models/Empleado.php';
require_once __DIR__ . '/models/Usuario.php';

// 3. LÓGICA DE LOGIN / LOGOUT
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'dashboard';

// -- ACCIÓN DE LOGIN --
if ($seccion == 'login') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuarioModel = new Usuario();
        $login = $usuarioModel->login($_POST['email'], $_POST['password']);
        
        if ($login) {
            $_SESSION['usuario'] = $login;
            header("Location: index.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
            include 'views/auth/login.php';
            exit();
        }
    }
}

// -- ACCIÓN DE LOGOUT --
if ($seccion == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit();
}

// 4. BARRERA DE SEGURIDAD
if (!isset($_SESSION['usuario'])) {
    // Si no estás logueado, te manda al login
    include 'views/auth/login.php';
    exit();
}

// =======================================================
// ZONA PRIVADA (Solo llegan los logueados)
// =======================================================

include 'views/layouts/header.php';

switch ($seccion) {
    
    // --- ADMIN: USUARIOS ---
    case 'admin_usuarios':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        $uModel = new Usuario();
        $usuarios = $uModel->getTodos();
        include 'views/admin/gestion_usuarios.php';
        break;

    case 'crear_usuario':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uModel = new Usuario();
            $uModel->crear($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['rol']);
            echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        }
        break;

    case 'borrar_usuario':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        if (isset($_GET['id'])) {
            $uModel = new Usuario();
            $uModel->borrar($_GET['id']);
        }
        echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        break;

    // --- RRHH: EMPLEADOS ---
    case 'empleados':
        $rrhh = new Empleado();
        $listaEmpleados = $rrhh->getTodos();
        $gastoTotal = $rrhh->getGastoTotalSueldos();
        include 'views/empleados/equipo.php';
        break;

    case 'crear_empleado':
        // IMPORTANTE: Bloqueo de seguridad aquí también
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        include 'views/empleados/crear.php';
        break;

    case 'guardar_empleado':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rrhh = new Empleado();
            $rrhh->insertar($_POST['nombre'], $_POST['cargo'], $_POST['email'], $_POST['sueldo']);
            echo "<script>window.location='index.php?seccion=empleados';</script>";
        }
        break;

    case 'borrar_empleado':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        // Aquí iría la lógica de borrar empleado...
        echo "<script>window.location='index.php?seccion=empleados';</script>";
        break;

    // --- TALLER ---
    case 'taller':
        $taller = new Taller();
        $listaCitas = $taller->getCitasActivas();
        // OJO AQUÍ: Seguramente tu archivo se llama 'dashboard.php' y no 'dashboard_taller.php'
        // He puesto 'dashboard.php' que es lo estándar. Verifica el nombre en tu carpeta.
        if (file_exists('views/taller/dashboard_taller.php')) {
            include 'views/taller/dashboard_taller.php';
        } else {
            include 'views/taller/dashboard.php'; 
        }
        break;

    // --- COCHES ---
    case 'coches':
        $ventas = new Coche();
        $listaCoches = $ventas->getTodos();
        include 'views/coches/listado.php';
        break;

    case 'inventario_piezas':
        require_once 'models/Pieza.php';
        $piezaModel = new Pieza();
        $listaPiezas = $piezaModel->getInventario();
        $view = 'views/taller/inventario_piezas.php';
        break;

    case 'ficha_coche':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $cocheData = $cocheModel->getPorId($id); // Debes crear getPorId en el modelo Coche
            $view = 'views/coches/ficha.php';
        }
        break;    


    // --- DASHBOARD PRINCIPAL ---
    case 'dashboard':
    default:
        $modeloCoches = new Coche();
        $modeloTaller = new Taller();
        $modeloRRHH = new Empleado();
        
        $totalCoches = count($modeloCoches->getTodos());
        $vipCoches = count($modeloCoches->getDestacados());
        $citasPendientes = count($modeloTaller->getCitasActivas());
        $totalEmpleados = count($modeloRRHH->getTodos());
        
        include 'views/dashboard/main.php';
        break;
}

include 'views/layouts/footer.php';
?>