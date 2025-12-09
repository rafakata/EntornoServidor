<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Rafael Medina Quelle Examen 9 de Diciembre de 2025.
    
        // 1. Declaración de variables de usuario (yo) y presupuesto (he puesto el mismo que el del ejemplo.)
        $nombre="Rafael Medina Quelle"; // Nombre del cliente
        $presupuesto=50.05; // Presupuesto disponible
        echo "<h1>Hola $nombre, tu presupuesto es $presupuesto euros.</h1><br>"; //echo para imprimir el saludo y el presupuesto.

        // 2. Ralla horizontal como separador tal y como se muestra en el examen.
        echo "<hr>";

        // 3. Comprobación del saldo y mensaje correspondiente (no se contempla que el precio no pueda ser negativo).
        if ($presupuesto<20){
            echo "<p>Saldo insuficiente, por favor recarga</p>";
        }elseif ($presupuesto>=20 && $presupuesto<100){
            echo "<p>Saldo correcto, puedes comprar.</p>";
        }else{
            echo "Cliente VIP:Tienes descuento especial.";
        }

        // 4. Definición del carrito de la compra (array asociativo) con los ejemplos del examen.
        $carrito=[
            "Leche"=>1.20,
            "Pan"=>0.80,
            "Detergente"=>5.50,
            "Manzanas"=>2.00
        ];

        echo "<hr>";

        // 5. Mostrar el contenido del carrito con print_r para depuración.
        echo "<pre>";
        print_r($carrito);
        echo "</pre>";

        echo "<hr>";

        // 6. Mostrar la tabla de productos y precios.
        echo "<h2>Ticket de compra</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Producto</th><th>Precio</th></tr>";

        $total=0; // 7. Inicializo el total.

        // 8. Recorrer el carrito y mostrar cada producto y su precio.
        foreach ($carrito as $producto => $precio){
            echo "<tr>";
            echo "<td>$producto</td>";
            echo "<td>$precio €</td>";
            echo "</tr>";

            $total=$total+$precio; // Sumo el precio al total.
        }

        // 9. Cerrar la tabla y mostrar el total a pagar en negrita.
        echo "</table>";
        echo "<br><strong>Total a pagar: $total €</strong>";
    ?>
</body>
</html>