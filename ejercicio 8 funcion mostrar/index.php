<?php
include ("conexion.php");
include ("funciones.php");

mostrart("clientes","dniCliente"); // Liberamos los registros
mysqli_close($link); // Cerramos la conexion con la base de datos
?>