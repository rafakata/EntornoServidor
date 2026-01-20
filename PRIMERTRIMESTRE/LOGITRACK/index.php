<?php
require_once 'Flota.php';

$miFlota = new Flota();

if(isset($_POST['datos_antiguos'])){
    $miFlota->cargarDeTexto($_POST['datos_antiguos']);
}

if (isset($_POST['accion'])&&$_POST['accion']=='crear'){
    $tipo=$_POST['tipo'];
    $mat=$_POST['matricula'];
    $mar=$_POST['marca']; 
    $carga=$_POST['carga'];
    switch($tipo){
        case 'furgoneta':
            $v=new Furgoneta($mat,$mar,$carga);
            $miFlota->agregarVehiculo($v);
            break;
        case 'camion':
            $esRefri=isset($_POST['refri'])?true:false;
            $v=new Camion($mat,$mar,$carga,$esRefri);
            $miFlota->agregarVehiculo($v);
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión LogiTrucks</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f0f0f0; }
        .caja { background: white; padding: 20px; margin-bottom: 20px; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #333; color: white; }
    </style>
</head>
<body>
 
    <h1>🚚 LogiTrucks Manager</h1>
 
    <div class="caja">
        <h3>Nuevo Vehículo</h3>
        <form action="" method="POST">
            
            <input type="hidden" name="datos_antiguos" value="<?php echo $miFlota->guardarEnTexto(); ?>">
            <input type="hidden" name="accion" value="crear">
 
            <label>Tipo:</label>
            <select name="tipo">
                <option value="furgoneta">Furgoneta</option>
                <option value="camion">Camión</option>
            </select>
            <br><br>
 
            <label>Matrícula:</label>
            <input type="text" name="matricula" required placeholder="1234-BBB">
            <br><br>
 
            <label>Marca:</label>
            <input type="text" name="marca" required>
            <br><br>
 
            <label>Carga (Kg):</label>
            <input type="number" name="carga" required>
            <br><br>
 
            <label>Solo Camiones:</label>
            <input type="checkbox" name="refri"> ¿Refrigerado?
            <br><br>
 
            <input type="submit" value="Guardar Vehículo">
        </form>
    </div>
 
    <div class="caja">
        <h3>Flota Actual (Simulación de ruta 100km)</h3>
        <table>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Coste Ruta (100km)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Recuperamos el array de objetos desde la clase Flota
                $vehiculos = $miFlota->getVehiculos();
 
                // Bucle FOREACH para pintar una fila por cada vehículo (UD4)
                foreach ($vehiculos as $vehiculo) {
                    
                    // POLIMORFISMO EN ACCIÓN:
                    // Llamamos a calcularCosteEnvio() sin saber si es camión o furgoneta.
                    // PHP sabe cuál ejecutar automáticamente.
                    $coste = $vehiculo->calcularCosteEnvio(100);
 
                    echo "<tr>";
                        // Usamos el método getInfo del padre
                        echo "<td>" . $vehiculo->getInfo() . "</td>";
                        
                        // get_class es una función de PHP para saber el nombre de la clase
                        echo "<td>" . get_class($vehiculo) . "</td>";
                        
                        // number_format para poner 2 decimales (UD3 - Funciones matemáticas)
                        echo "<td>" . number_format($coste, 2) . " €</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
 
</body>
</html>