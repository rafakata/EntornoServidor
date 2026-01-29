<?php

class Coche extends Db{
    function __construct(){
        parent::__construct();
    }
/**
 * Obtiene todos los coches del inventario
 */
    public function getTodos(){
        //Ordenamos los coches por precio descendente
        $sql="SELECT * FROM coches ORDER BY precio DESC";
        $resultado=$this->db->prepare($sql);

        $coches=[];
        while ($row=resultado->)

    }
}
?>