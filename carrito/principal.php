<?php
session_start();
if (isset($_SESSION['nombre'])){
	?>
	<HEAD>
   		<TITLE>Tienda OnLine</TITLE>
   		<LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
	</HEAD>
	<body>
	<div id='contenedor'>
	<?php
	echo "bienvenido ".$_SESSION['nombre']."";
	echo "<br>";
	echo "<div class='carrito'><a href='vercesta.php'>";
	echo "<img width='70' src='carrito.png'><br>";
	echo $_COOKIE["ctotal"];
	echo "</a></div>";
	require ('conexion.php');
	$result = mysqli_query($link,"SELECT * FROM productos");
	while($row = mysqli_fetch_array($result)) {
		echo "<div class='producto'>";
		echo "<img  width='200' src='img/".$row['foto']."'><br>";
		echo $row['nombre']."<br>";
		echo $row['precio']."<br><br>";
		echo "<a class='boton' href='detalle.php?ident=".$row['idProducto']."'> Detalle</a><br><br><br><br>";
		echo "</div>";
	} 
	mysqli_free_result($result); 
	mysqli_close($link); 
	echo "</div>";
	echo "</body>";
}
else header("Location: index.php");	
?>