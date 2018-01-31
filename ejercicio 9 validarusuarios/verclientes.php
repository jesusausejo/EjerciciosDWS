<?php
session_start();
if (isset($_SESSION['usuario'])){
	echo "Bienvenido ".$_SESSION['usuario'];
	include ("conexion.php");
	$result = mysqli_query($link,"SELECT * FROM clientes");
	// comienza un bucle que leerá todos los registros existentes
	echo "<table> <tr> <td>dniCliente </td><td>nombre </td><td>direccion </td>";
	echo "<td> email</td><td>pwd </td> </tr>";
	while($row = mysqli_fetch_array($result)) {
	// $row es un array con todos los campos existentes en la tabla
		echo "<tr> <td>".$row['dniCliente']."</td>";
		echo "<td> ".$row['nombre']."</td>";
		echo "<td> ".$row['direccion']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['pwd']."</td></tr>";
	
	} // fin del bucle de instrucciones
	mysqli_free_result($result); // Liberamos los registros
	mysqli_close($link); // Cerramos la conexion con la base de datos
	echo "</table>";
	echo "<a href='salir.php'> Salir </a>";
}
else header("Location: index.php");	
?>