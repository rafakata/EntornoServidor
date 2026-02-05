<?php
require_once 'Db.php';

class Pieza extends Db {
    public function __construct() {
        parent::__construct();
    }

    public function getInventario() {
        $sql = "SELECT * FROM piezas ORDER BY stock ASC";
        $resultado = $this->consulta($sql);
        $piezas = [];
        while ($row = $resultado->fetch_assoc()) {
            $piezas[] = $row;
        }
        return $piezas;
    }
}