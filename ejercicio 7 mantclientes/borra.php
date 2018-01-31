<?php
include ("conexion.php");
include ("funciones.php");
$dniCliente=$_REQUEST['dni'];
$consul="DELETE FROM clientes  WHERE dniCliente='$dniCliente'";
$result = mysqli_query($link,$consul);
if (!$result) echo "ha habido un error <a href='index.php'>volver</a>";
else echo "se ha borrado con exito <a href='index.php'>volver</a>";
?>