<?php
$dni=$_REQUEST['dni'];
include ("conexion.php");
$consul="SELECT * FROM clientes where dniCliente='".$dni."'";
$result = mysqli_query($link,$consul);
$row = mysqli_fetch_assoc($result);
foreach ($row	 as $campo => $valor) {
		echo $campo.": ".$valor."<br>";
	}
	echo "<br>";
	echo "<a href='index.php'>volver</a>";
?>