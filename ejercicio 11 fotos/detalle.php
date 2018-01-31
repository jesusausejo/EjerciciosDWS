<?php
include ("conexion.php");
include ("funciones.php");
$tabla=$_GET['tabla'];
$valor=$_GET['valor'];
$campo=$_GET['campo'];
detalle($tabla,$campo,$valor,"idProducto, nombre, origen","foto"); 
echo "<br><a href='index.php'> Volver</a>";
echo "<br><a href='salir.php'> Salir</a>";
mysqli_close($link); // Cerramos la conexion con la base de datos
?>