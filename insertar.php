<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insertar Usuario</title>
  </head>
  <body>
    <?php
    include "dbUsuarios.php";

    $equipo=new dbNBA();
    $equipo->insertarEquipo($_POST["nombre"],$_POST["ciudad"],$_POST["conferencia"],$_POST["division"]);

    $resultado=$equipo->devNuevaFila($_POST["nombre"]);
    $fila=$resultado->fetch_assoc();
    echo "Nuevo equipo: ".$fila["Nombre"]."<br>";
    echo "Desde la ciudad de: ".$fila["Ciudad"]."<br>";
    echo "Pertenecen a la conferencia: ".$fila["Conferencia"]."<br>";
    echo "y a la division: ".$fila["Division"]."<br>";
     ?>
  </body>
</html>
