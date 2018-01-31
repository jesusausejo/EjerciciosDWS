<?php
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db( $link,"virtualmarket");
$tildes = $link->query("SET NAMES 'utf8'");
$result = mysqli_query($link,"SELECT * FROM clientes");
// comienza un bucle que leerá todos los registros existentes
echo "<table> <tr> <td>dniCliente </td><td>nombre </td><td>direccion </td>";
echo "<td> email</td><td>pwd </td> >/tr>";
while($row = mysqli_fetch_array($result)) {
// $row es un array con todos los campos existentes en la tabla
	
	echo "<tr> <td>".$row['dniCliente']."</td>";
	echo "<td> ".$row['nombre']."</td>";
	echo "<td> ".$row['direccion']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['pwd']."</td>";
	echo "<td> <a href='detalle.php?dni=".$row['dniCliente']."'> + </a></td></tr>";
} // fin del bucle de instrucciones
echo "</table>";
mysqli_free_result($result); // Liberamos los registros
mysqli_close($link); // Cerramos la conexion con la base de datos
?>