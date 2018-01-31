<head> <meta charset="UTF-8"/></head> 
<?php // Conectando al servidor y a la base de datos
require_once "Modelo.php"; 

$conectadb = new dbmysqli("localhost","root","root","virtualmarket");


$sql="CREATE TABLE IF NOT EXISTS clientes2 (idcliente int(11) NOT NULL AUTO_INCREMENT,  nombre varchar(255) NOT NULL, apellido varchar(255) NOT NULL, PRIMARY KEY (idcliente))";

$conectadb->creartabla($sql);


$clientes = array("nombre"=>'Carlos', "apellido"=> 'Lopez Ondarria' );

$conectadb ->insertar("clientes2",$clientes) ;


$clientesborrar = array("idcliente"=>array(1,2));

$conectadb ->borrar("clientes2",$clientesborrar) ;

$clientesset = array("nombre"=>'Rosa', "apellido"=> 'Dorien Triana');

$clienteswhere= array("idcliente"=>array(6,8));;

$conectadb->Actualizar("clientes2",$clientesset,$clienteswhere);

/*$clientesbuscar = array("idcliente","nombre","apellido");

$res=$conectadb ->buscar("clientes2", $clientesbuscar);
echo "<br>";
while  ( $row = $res->fetch_assoc()) {
	foreach ($row as $key => $value)  echo $row[$key]." - "; 
	echo "<br>";
   }*/

$conectadb ->estructura2("clientes2");
//$conectadb ->vercons();
?>