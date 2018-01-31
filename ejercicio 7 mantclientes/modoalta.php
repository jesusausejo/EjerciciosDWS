<?php
include ("conexion.php");
include ("funciones.php");

if ($_REQUEST['tipo']=="m"){
	$dni=$_REQUEST['dni'];
	$row = existe($dni)
	modialta ("m",$row);
}else modialta ("a","");

?>