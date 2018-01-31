<?php
include ("conexion.php");
$result = mysqli_query($link,"SELECT * FROM clientes");
// comienza un bucle que leerá todos los registros existentes
echo "<a href='modoalta.php?tipo=a'> Añadir </a>";
echo "<table> <tr> <td>dniCliente </td><td>nombre </td><td>direccion </td>";
echo "<td> email</td><td>pwd </td><td></td><td></td><td></td> </tr>";
while($row = mysqli_fetch_array($result)) {
// $row es un array con todos los campos existentes en la tabla	
	echo "<tr> <td>".$row['dniCliente']."</td>";
	echo "<td> ".$row['nombre']."</td>";
	echo "<td> ".$row['direccion']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['pwd']."</td>";
	echo "<td> <a href='consulta.php?dni=".$row['dniCliente']."'> c </a></td>";
	echo "<td> <a href='borra.php?dni=".$row['dniCliente']."'> b </a></td>";
	echo "<td> <a href='modoalta.php?dni=".$row['dniCliente']."&tipo=m'> m </a></td></tr>";
} // fin del bucle de instrucciones
echo "</table>";
mysqli_free_result($result); // Liberamos los registros
mysqli_close($link); // Cerramos la conexion con la base de datos
?>