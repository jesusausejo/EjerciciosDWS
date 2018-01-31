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
	require ('funciones.php');
	echo "bienvenido ".$_SESSION['nombre']."";
	echo "<br>";
	$total=$_COOKIE['ctotal'];
	if ($total>0){ 
		$datos=vercookie();
	}
	if (isset($_REQUEST['comprar'])) {
		$total=$total+1;		
		setcookie('ctotal',$total, time()+36000);
		setcookie('cid['.$total.']',$_REQUEST['fid'], time()+36000);
		$datos['id'][$total]=$_REQUEST['fid'];
		setcookie('cnombre['.$total.']',$_REQUEST['fnombre'], time()+36000);
		$datos['nombre'][$total]=$_REQUEST['fnombre'];
		setcookie('cprecio['.$total.']',$_REQUEST['fprecio'], time()+36000);
		$datos['precio'][$total]=$_REQUEST['fprecio'];
		setcookie('ccantidad['.$total.']',$_REQUEST['fcantidad'], time()+36000);
		$datos['cantidad'][$total]=$_REQUEST['fcantidad'];
	}elseif (isset($_REQUEST['actualizar'])) {
		for ($i=1; $i <=$total ; $i++)  {			
		$datos['cantidad'][$i]=$_REQUEST['mcantidad'][$i];
		setcookie('ccantidad['.$i.']',$_REQUEST['mcantidad'][$i]);	
		}
	}
	if ($total>0){
		$cestahtml=cesta($datos,1);
		echo "<form action='vercesta.php' method='post'>";
		echo $cestahtml;
		echo "<input class='boton' type='submit' name='actualizar' value='Actualizar cantidades'>";
		echo "</form>";
		echo "<a class='boton' href='confirmar.php' align='center'>Procesar Pedido</a> ";
	}
	else echo "la cesta está vacia";
	echo " <a class='boton' href='principal.php' align='center'>Seguir Comprando</a>";
	echo "</div>";
	echo "</body>";
}
else {
	header("Location: index.php");	
}
?>