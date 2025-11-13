<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$nombreProducto="PC GAMING MODELO X";
$precioBase=800.50;
$stock=8;
$enOferta=true;
echo "<h1>Detalle del producto</h1>";
echo '<p>Producto: $nombreProducto</p>';
echo "<p>Producto: $nombreProducto</p>";

if($enOferta){
    $precioFinal=$precioBase*0.90;
    echo "<p> EN OFERTAA Precio Final: $precioFinal. €";
}else{
    echo "<p> Precio Final: $precioBase. €</p>";
}

if($stock>10){
    echo "<p>Stock disponible</p>";
}elseif($stock<10 and $stock>0){
    echo "<p>ÚLTIMAS UNIDADES</p>";
}else{
    echo "<p>Producto agotado</p>";
} 
/*

while($stock>0){
    echo "<p>Quedan $stock unidades</p>";
    $stock--;
}
    */

echo"<label>Cantidad:</label>";
echo "<select name='cantidad'>";
$i=1;
while($i<=$stock){
    echo "<option value='$i'>$i</option>";
    $i++;
}
echo "</select>";

function precio_con_iva(){
    global $precioFinal;
    $precioIVA=$precioFinal*1.21;
    echo "<p>Precio con IVA: $precioIVA €</p>";
}
precio_con_iva();
?>
</body>
</html>