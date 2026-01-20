<?php
class dbNBA{
    //Atributos necesarios para la conexión
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db_name="nba";
    //Conector
    private $conexion;
    //Propiedad para controlar errores
    private $error=false;

    function __construct(){
        $this->conexion=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
        if($this->conexion->connect_errno){
            $this->error=true;
        }
    }
    function hayError(){
        return $this->error;
    }   

    public function devolverEquipos(){
        if ($this->error==false){
            $resultado=$this->conexion->query("SELECT nombre FROM equipos");
            return $resultado;
        }else{
            return null;
        }
    }

    public function devolverEquiposConf($conferencia){
        if ($this->error==false){
            $resultado=$this->conexion->query("SELECT nombre,conferencia FROM equipos where conferencias='".$conferencia."'");
            return $resultado;
        }else{
            return null;
        }
    }
}
?>