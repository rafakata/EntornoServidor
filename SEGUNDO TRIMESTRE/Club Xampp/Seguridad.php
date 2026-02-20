<?php
class Seguridad{
    private $usuario=null;
    public function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_SESSION['usuario'])){
            $this->usuario=$_SESSION['usuario'];
        }
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function addUsuario($user){
        $this->usuario=$user;
        $_SESSION['usuario']=$user;
    }
    public function logOut(){
        session_unset();
        session_destroy();
        $this->usuario=null;
    }
}
?>