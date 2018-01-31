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
	$cod=$_REQUEST['ident'];
	require ('conexion.php');
	$cond="SELECT * FROM productos where idProducto='$cod'";
	$result = mysqli_query($link,$cond);
	$row = mysqli_fetch_array($result);
	echo "<div class='detalle'>";
	echo "<img src='img/".$row['foto']."'/>";
	echo "</div>";
	echo "<div class='detalle'>";
	echo $row['idProducto']."<br>";
	echo "<h3>".$row['nombre']."</h3><br>";
	echo $row['origen']."<br>";
	echo $row['marca']."<br>";
	echo $row['categoria']."<br>";
	echo $row['peso']."<br>";
	echo $row['precio']."<br>";
	echo "<form action='vercesta.php' method='post'>";
	echo "Cantidad: <input type='number' name='fcantidad' value='1'><br>";
	echo "<input type='hidden' name='fid' value='".$row['idProducto']."'>";
	echo "<input type='hidden' name='fnombre' value='".$row['nombre']."'>";
	echo "<input type='hidden' name='fprecio' value='".$row['precio']."'>";
	echo "<input class='boton' type='submit' name='comprar' value='comprar'>";
	echo "</form>";
	echo "</div>";
	mysqli_free_result($result);
	mysqli_close($link);
	echo "</div>";
	echo "</body>";
}
else {
	header("Location: index.php");	
}
?>