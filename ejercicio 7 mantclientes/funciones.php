<?php
function modialta ($tipo,$reg){

if ($tipo=='a') {
	$fich="alta.php";
	$reg= $arrayName = array('dniCliente' => "" ,'nombre' => "" ,  'direccion' => "" ,'email' => "" ,'pwd' => "" );
	$primer= "dniCliente: <input type='text' name='dniCliente'><br>";
}else
{
	$fich="modifica.php";
	$primer= "<input type='hidden' name='dniCliente' value='".$reg['dniCliente']."'>";
	$primer.= "dniCliente: ". $reg['dniCliente']."<br>";

}
echo "<form action='$fich'>";

echo $primer;
echo "nombre: <input type='text' name='nombre' value='";
echo $reg['nombre']."'><br>";
echo "direccion: <input type='text' name='direccion' value='";
echo $reg['direccion']."'><br>";
echo "email: <input type='text' name='email' value='";
echo $reg['email']."'><br>";
echo "Pasword: <input type='text' name='pwd' value='";
echo $reg['pwd']."'><br>";
echo "<input type='submit' value='Enviar'></form>";
}

function existe ($clave){
	global $link;
	$consul="SELECT * FROM clientes where dniCliente='".$clave."'";
	$result = mysqli_query($link,$consul);
	return mysqli_fetch_assoc($result);
}
?>