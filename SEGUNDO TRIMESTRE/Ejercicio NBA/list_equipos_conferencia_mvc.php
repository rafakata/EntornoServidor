<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Equipos</title>
    </head>
    <body>
        <?php
        //Incluimos la base de datos
        include "nba_db.php";
        //Creamos el objeto de la base de datos, en este caso conectamos con nba_db que hemos creado anteriormente.
        $nba=new dbNBA();
        $resultado=$nba->devolverEquiposConf($conferencia);
        if ($resultado!=null){
            while($fila=$resultado->fetch_assoc()){
                echo "El Equipo ".$fila['nombre']." de la conferencia ".$fila['conferencia']."<br>";
            }
        }
        ?>
    </body>
</html>