<?php
include ("conexion.php");
include ("funciones.php");
$dniCliente=$_REQUEST['dniCliente'];
$nombre=$_REQUEST['nombre'];
$direccion=$_REQUEST['direccion'];
$email=$_REQUEST['email'];
$pwd=$_REQUEST['pwd'];

$consul="UPDATE clientes SET nombre='$nombre', direccion='$direccion', email='$email', pwd='$pwd' WHERE dniCliente='$dniCliente'";
$result = mysqli_query($link,$consul);
if (!$result) echo "ha habido un error <a href='modoalta.php?tipo=\'m\'&dni=$dni'>volver</a>";
else echo "se ha grabado con exito <a href='index.php'>vovler</a>"

?>