<?php
require_once 'Db.php';

class Coche extends Db {
    
    function __construct() {
        parent::__construct();
    }

    /**
     * Obtiene todos los coches del inventario
     */
    public function getTodos() {
        // Ordenamos por precio descendente (los caros primero)
        $sql = "SELECT * FROM coches WHERE vendido = 0 ORDER BY precio DESC";
        $resultado = $this->consulta($sql);
        
        $coches = [];
        while ($row = $resultado->fetch_assoc()) {
            $coches[] = $row;
        }
        return $coches;
    }

    /**
     * Obtiene solo los coches marcados como DESTACADOS (VIP)
     * Ideal para un carrusel o portada.
     */
    public function getDestacados() {
        $sql = "SELECT * FROM coches WHERE destacado = 1";
        $resultado = $this->consulta($sql);
        
        $coches = [];
        while ($row = $resultado->fetch_assoc()) {
            $coches[] = $row;
        }
        return $coches;
    }

    public function vender($id) {
    $id = $this->escapar($id);
    return $this->consulta("UPDATE coches SET vendido = 1 WHERE id = $id");
    }

    public function marcarComoVendido($id) {
    $id = $this->escapar($id);
    $sql = "UPDATE coches SET vendido = 1 WHERE id = $id";
    return $this->consulta($sql);
    }

    public function getPorId($id) {
    $id = $this->escapar($id);
    $sql = "SELECT * FROM coches WHERE id = $id";
    $resultado = $this->consulta($sql);
    return $resultado->fetch_assoc();
    }

}
?>