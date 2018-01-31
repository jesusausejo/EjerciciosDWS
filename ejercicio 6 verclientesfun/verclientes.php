<?php
include('funciones.php');
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db( $link,"virtualmarket");
$tildes = $link->query("SET NAMES 'utf8'");
$result = mysqli_query($link,"SELECT * FROM clientes");
// comienza un bucle que leerá todos los registros existentes
while($row = mysqli_fetch_assoc($result)) ver($row); // fin del bucle de instrucciones
mysqli_free_result($result); // Liberamos los registros
mysqli_close($link); // Cerramos la conexion con la base de datos
?>