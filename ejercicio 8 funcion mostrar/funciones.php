<?php
function mostrart ($tabla,$campo){
	global  $link;

$result = mysqli_query($link,"SELECT * FROM $tabla");

$veces=1;
echo "<table>";
while($row = mysqli_fetch_assoc($result)) {
	if ($veces==1){
		$veces=2;
		$primera="<tr>";
		$segunda="<tr>";
		foreach ($row as $nombre => $valor) {
			$primera.="<td>$nombre</td>";
			$segunda.="<td>$valor</td>";
			
		}
		echo $primera."<td></td></tr>";
		echo $segunda;
	}else {
		echo "<tr>";
		foreach ($row as $nombre => $valor) 
			
			echo "<td>$valor</td>";
				
		}
		
	
	echo "<td> <a href='detalle.php?valor=".$row[$campo]."&campo=$campo&tabla=$tabla'> c </a></td></tr>";
	} // fin del bucle de instrucciones
echo "</table>";
}

function detalle ($tabla,$campo,$valorid){
	global  $link;
	$result = mysqli_query($link,"SELECT * FROM $tabla where $campo='$valorid'");
	$row = mysqli_fetch_assoc($result);
	foreach ($row as $nombre => $valor) 
			echo "$nombre: $valor<br>";
	}
?>