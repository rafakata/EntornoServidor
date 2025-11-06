<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*
      $modulos=["DWES","DWEC","DAW"];

      $modulos[0]="Entorno Servidor";
      $modulos[]="Jon I miss u";
      echo"";
      print_r($modulos);
      echo"";
    */
      $usuario=[
        "nombre"=>"Jon",
        "email"=>"jondoe@correo.com",
        "edad"=>25
      ];

      $usuario["edad"]=26;

      print_r($usuario);
      echo $usuario["email"];

      echo"";
      foreach($usuario as $clave=>$valor){
        echo " $clave : $valor ";
      }
      echo"";

      if (isset($_POST[`nombre`])){
        echo "Datos recibidos (con foreach)";
        echo"";
        foreach($_POST as $clave=>$valor){
          echo " $clave : $valor ";
        }
        echo"";
      }

      /*
      $operadores=[5,15];
      $suma=$operadores[0]+$operadores[1];
      echo "<br> La suma es: $suma <br>";

      $frutas=["naranja","manzana","plátano"];
      echo "";
      foreach($frutas as $fruta){
        echo "$fruta";
      }
      echo "";
      */
    ?>
</body>
</html>