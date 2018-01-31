<body>
<?php 
	define("numero", 4);  
	echo "<table>";
	$acum=1; 
	for ($i=numero; $i >0 ; $i--) { 
		$acum*=$i;
		echo "<tr>";
		echo "<td>";
			echo $i;
		echo "</td>";
		echo "<td>";
			if ($i!=numero) echo $acum;
		echo "</td>";
		echo "</tr>";
	} 
	echo "</table>";
?>



</body>