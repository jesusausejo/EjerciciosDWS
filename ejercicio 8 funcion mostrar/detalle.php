<?php
include ("conexion.php");
include ("funciones.php");
$tabla=$_GET['tabla'];
$valor=$_GET['valor'];
$campo=$_GET['campo'];

detalle($tabla,$campo,$valor); // Liberamos los registros
mysqli_close($link); // Cerramos la conexion con la base de datos
?>