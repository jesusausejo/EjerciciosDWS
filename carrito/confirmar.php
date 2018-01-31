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
	require ('conexion.php');
	require ('funciones.php');
	echo "bienvenido ".$_SESSION['nombre']."";
	echo "<br>";
	$cons= "SELECT max(idPedido) as maxim FROM pedidos ";
	$result = mysqli_query ($link,$cons);
	If ($fila= mysqli_fetch_assoc($result))
	$idmax=$fila['maxim'];
	else $idmax=0;
	$cons = "insert into pedidos (idPedido, fecha, dniCliente) values ($idmax+1, now(), '".$_SESSION['dni']."')";
	$result = mysqli_query ($link,$cons);
	$datos=vercookie();
	$total=$_COOKIE['ctotal'];
	for ($i=1; $i <=$total ; $i++)  {
		if ($datos['cantidad'][$i]>0) {				
			$cons = "insert into lineaspedidos (idPedido, nlinea , idProducto,cantidad) values ($idmax+1, $i, ".$_COOKIE['cid'][$i].", ".$_COOKIE['ccantidad'][$i].")";
			$result = mysqli_query ($link,$cons);
		}
		setcookie('cid['.$i.']',"", time()-36000);
		setcookie('cnombre['.$i.']',"", time()-36000);
		setcookie('cprecio['.$i.']',"", time()-36000);
		setcookie('ccantidad['.$i.']',"", time()-36000);	
		}
 	setcookie('ctotal',"", time()-36000);
	session_destroy();	
	$cestahtml=cesta($datos,0);
	echo "Es siguiente pedido ha sido procesado:<br>".$cestahtml;
	echo "<a class='boton' href='index.php' align='center'>Terminar</a> ";
	echo "</div>";
	echo "</body>";
}
else {
	header("Location: index.php");	
}
?>