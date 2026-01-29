<?php
include "dbTienda.php";
$tienda=new dbTienda();
if (isset($_GET['id'])){
    $id_producto=$_GET['id'];
    $tienda->borrar($id_producto);
    exit();
}else{
    header("Location: index.php");
    exit();
}
header("Location: index.php");
exit();
?>