<?php
 
class Asistente {
    private $nombre;
    private $email;
    private $edad;
    private $tipoEntrada;
 
    public function __construct($nombre, $email, $edad, $tipoEntrada) {
    $this->nombre = $nombre;
        $this->email = $email;
        $this->edad = $edad;
        $this->tipoEntrada = $tipoEntrada;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getEdad() {
   return $this->edad;
    }
    public function getTipoEntrada() {
        return $this->tipoEntrada;
    }
    public function calcularPrecio() {
     $precioBase = 50;
        switch ($this->tipoEntrada) {
            case 'vip':
                return $precioBase * 2;
            case 'estudiante':
                return $precioBase * 0.5;
            case 'general':
            default:
                return $precioBase;
       }
    }
}
?>
