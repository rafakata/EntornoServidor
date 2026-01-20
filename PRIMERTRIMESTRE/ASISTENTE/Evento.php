<?php
require_once 'Asistente.php';

class Evento{
    private $listaAsistentes;
    private $capacidadMaxima;

    public function __construct($capacidad){
        $this->capacidadMaxima = $capacidad;
        $this->listaAsistentes = [];
        $this->listaAsistentes[]=new Asistente ("Ana López", "ana@test.com", 25, "vip");
        $this->listaAsistentes[]=new Asistente ("Luis Pérez", "luis@test.com", 19, "estudiante");
    }

    public function registrarAsistente($asistente){
        if(count($this->listaAsistentes) < $this->capacidadMaxima){
            $this->listaAsistentes[] = $asistente;
            return true;
        } else {
            return false;
        }
    }

    public function getListaAsistentes(){
        return $this->listaAsistentes;
    }

    public function calcularRecaudacionTotal(){
        $total = 0;
        foreach($this->listaAsistentes as $asistente){
            $total += $asistente->calcularPrecio();
        }
        return $total;
    }
}
?>