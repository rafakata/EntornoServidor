<?php
require_once 'TiposVehiculos.php';

class Flota{
    private $listaVehiculos=[];
    public function agregarVehiculo(Vehiculo $nuevoVehiculo){
        $this->listaVehiculos[]=$nuevoVehiculo;
    }
    public function getVehiculos(){
        return $this->listaVehiculos;
    }
    public function guardarEnTexto(){
        return base64_encode(serialize($this->listaVehiculos));
    }
    public function cargarDeTexto($texto){
        if(!empty($texto)){
            $datosRecuperados=unserialize(base64_decode($texto));
        }
        if($datosRecuperados){
            $this->listaVehiculos=$datosRecuperados;
        }
    }
}
?>