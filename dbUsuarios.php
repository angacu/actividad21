<?php
// creamos la clase (db)
class dbNBA
{
  // a continuación los atributos que utilizaremos para la conexión
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";

  // creamos el objeto de conexion
  private $conexion;

  // control de los errores // utilizamos el nuevo __construct
  private $error=false;
  function __construct(){
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  // funcion de comprobación de errores
  function hayError(){
    return $this->error;
  }

  // las funciones que utilizaremos para la inserción
  public function insertarEquipo($nombre,$ciudad,$conferencia,$division){
  if ($this->error==false) {

  $insert_sql="INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES ('".$nombre."', '".$ciudad."', '".$conferencia."', '".$division."') ";
  if (!$this->conexion->query($insert_sql)) {
    echo "Nanai de tabla (" .$this->conexion->errno .") " . $this->conexion->error;
  }
  return true;
  }else{
  return null;
  }

  }
  public function devNuevaFila($nombre){
  if($this->error==false){
    //echo "SELECT * FROM equipos WHERE Nombre='".$nombre."'";
    $resultado = $this->conexion->query("SELECT * FROM equipos WHERE Nombre='".$nombre."'");
    return $resultado;
    }else{
    return null;
    }
  }
}
 ?>
