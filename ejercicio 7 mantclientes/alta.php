<?php
include ("conexion.php");
include ("funciones.php");
$dniCliente=$_REQUEST['dniCliente'];
if (!existe ($dniCliente)){
	$nombre=$_REQUEST['nombre'];
	$direccion=$_REQUEST['direccion'];
	$email=$_REQUEST['email'];
	$pwd=$_REQUEST['pwd'];
	$consul="Insert into clientes (dniCliente, nombre, direccion, email, pwd) VALUES ('$dniCliente', '$nombre', '$direccion', '$email', '$pwd' )";
	$result = mysqli_query($link,$consul);
	if (!$result) 
		echo "ha habido un error <a href='modoalta.php?tipo=a'> Volver </a>";
	else echo "se ha grabado con exito <a href='index.php'>volver</a>";

}else{
	echo "el cliente ya existe <a href='modoalta.php?tipo=a'> Volver </a>";

}

?>