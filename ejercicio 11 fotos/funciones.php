<?php
function mostrart ($tabla,$campo,$listac){
	global  $link;
	$result = mysqli_query($link,"SELECT $listac FROM $tabla");
	$veces=1;
	echo "<table>";
	while($row = mysqli_fetch_assoc($result)) {
		if ($veces==1){
			$veces=2;
			echo"<tr>";
			foreach ($row as $nombre => $valor) 
				echo "<td>$nombre</td>";
			echo "</tr>";
		}
		if ($veces==2) {
			echo "<tr><td></td>";
			foreach ($row as $valor) 			
				echo "<td>$valor</td>";
				
		}
		echo "<td> <a href='detalle.php?valor=".$row[$campo]."&campo=$campo&tabla=$tabla'> c </a></td></tr>";
	} // fin del bucle de instrucciones
	echo "</table>";
}

function detalle ($tabla,$campo,$valorid,$listac,$img){
	global  $link;
	$result = mysqli_query($link,"SELECT $listac, $img FROM $tabla where $campo='$valorid'");
	$row = mysqli_fetch_assoc($result);
	foreach ($row as $nombre => $valor)
		if ($nombre!=$img) echo "$nombre: $valor<br>";
	echo "<img src='img/".$row[$img]."'>";
}
?>
	
	