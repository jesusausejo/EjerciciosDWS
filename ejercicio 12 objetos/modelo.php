<?php

class dbmysqli{
	//declaramos una variable para conexión
	public $conexion;
	//Declaramos el constructor de la clase
  public function __construct($host, $usuario, $clave, $db)
  {
    $this->conexion = new mysqli($host, $usuario, $clave,$db);
  }

  //Función que crea tablas

  public function creartabla($sql) {
	 if ($this->conexion->query($sql) === TRUE) {
		  echo "Se ha creado una tabla";
  	 } else {
		  echo "Fallo:no se ha creado la tabla ".$this->conexion->error;
	   }
  }

  //Creamos la función que tomara como par&aacute;metro la matriz campo => dato

  public function insertar($tabla, $camposdatos){
                        //separamos los datos por si son varios
  	$campo = implode(", ", array_keys($camposdatos));
  	$i=0;
  	foreach($camposdatos as $indice=>$valor) {
  		 $dato[$i] = "'".$valor."'";
    	  	$i++;
  	}
 	$datos = implode(", ",$dato);
  	//Insertamos los valores en cada campo
	if($this->conexion->query("INSERT INTO $tabla ($campo) VALUES ($datos)") === TRUE){
 	  echo "Nuevo cliente insertado";
  	}else 	echo "Fallo no se ha insertado el cliente ".$this->conexion->error;
 	 
  }

//funcion para eliminar datos de una tabla

public function borrar($tabla, $camposdatos) {
	$indices=array_keys($camposdatos);
  $i=0;
 $indice=$indices[0];
 	foreach($camposdatos[$indice] as $valor) {

  		$dato[$i] = $indice."='".$valor."'";
      		$i++;
  	}
  	$campoydato = implode(" OR ",$dato);
    if($this->conexion->query("DELETE FROM $tabla WHERE $campoydato") === TRUE){
   		if(mysqli_affected_rows($this->conexion)){
  	  	echo "Registro eliminado";
 		} else{
  		 	echo "Fallo no se pudo eliminar el registro".$this->conexion->error;
  		}	
	}
}
public function Actualizar($tabla, $camposset, $camposcondicion){
 	//separamos los valores SET a modificar
	$i=0;
  	foreach($camposset as $indice=>$dato) {
   		$datoset[$i] = $indice." = '".$dato."'";
      		$i++;
  	}
  	$consultaset = implode(", ",$datoset);
    $indices=array_keys($camposcondicion);
  	
    $indice=$indices[0];
    $i=0;
	 foreach($camposcondicion[$indice] as $datocondicion) {
   		$condicion[$i] = $indice." = '".$datocondicion."'";
      		$i++;
  	}
 	$consultacondicion = implode(" OR ",$condicion);
	//Actualización de registros
	if($this->conexion->query("UPDATE $tabla SET $consultaset WHERE $consultacondicion") === TRUE){
   		if(mysqli_affected_rows($this->conexion)){
    			echo "Registro actualizado";
   		}  else{
   			echo "Fallo no se pudo eliminar el registro".$this->conexion->error;
  		}

}
}


public function buscar($tabla, $campos){
	$campos=implode(",",$campos);
  	$resultado=$this->conexion->query("SELECT $campos FROM $tabla");
	return $resultado;
}

public function estructura ($tabla){
  $consulta="select * from $tabla";
  if ($resultado = $this->conexion->query($consulta)) {
  /* Obtener la información del campo para todas las columnas */
    $info_campo = $resultado->fetch_fields();
    foreach ($info_campo as $valor) {
      echo "Nombre:             $valor->name <br>";
      echo "Tabla:               $valor->table<br>";
      echo "Longitud m&aacute;x.:       $valor->max_length<br>";
      echo "Longitud:           $valor->length<br>";
      echo "Num. conj. caract.:    $valor->charsetnr<br>";
      echo "Banderas:            ";
      $this->bandera($valor->flags);
      echo  "<br>";
      echo "Tipo:            "; 
      $this->tipo($valor->type);
      ECHO "<br>";ECHO "<br>";ECHO "<br>";
    }
  $resultado->free();
  }
}

public function estructura2 ($tabla){
  $consulta="SHOW COLUMNS FROM $tabla";
  if ($resultado = $this->conexion->query($consulta)) {
  /* Obtener la información del campo para todas las columnas */
    while ($fila = $resultado->fetch_assoc()){
    foreach ($fila as $clave=>$valor) 
      echo "$clave:$valor<br>";
      
      ECHO "<br>";ECHO "<br>";ECHO "<br>";}
    
  $resultado->free();
  }
}

public function tipo($valor){
  $constants = get_defined_constants(true);
  foreach ($constants['mysqli'] as $c => $n)          
            if (($pos = strpos($c, 'MYSQLI_TYPE')!== FALSE) && ($n==$valor)) echo "$c "; 
          
  
}
public function bandera($valor){
  $constants = get_defined_constants(true);
  foreach ($constants['mysqli'] as $c => $n)         
            if (($pos = strpos($c, 'FLAG')!== FALSE) && ($n & $valor) ){
              echo "$c <br>";
          }
  }

public function vercons(){
  $constants = get_defined_constants(true);
  foreach ($constants['mysqli'] as $c => $n)          
             echo "$c $n<br>"; 
}


}
?>