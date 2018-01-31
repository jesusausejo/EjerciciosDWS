<?php
session_start();
include ("conexion.php");
include ("funciones.php");

if (isset($_COOKIE['usuario'])){
	if (!isset($_SESSION['usuario'])){
	$nom=$_COOKIE['usuario'];
	$_SESSION['usuario']=$nom;
	echo "Bienvenido de nuevo $nom";
	}
	else echo "Bienvenido ".$_SESSION['usuario'];
	mostrart("productos","idProducto","idProducto, nombre, precio");
	echo "<a href='salir.php'> Salir </a>";
}
else{
	if (isset($_POST['enviar'])) {
		if (!empty($_POST['nom']) && !empty($_POST['pass'])){
			$nom=$_POST['nom'];
			$pass=$_POST['pass'];
			include ("conexion.php");
			$consul="SELECT * FROM clientes where nombre='".$nom."' and pwd='".$pass."'";
			$result = mysqli_query($link,$consul);
			if ($row = mysqli_fetch_array($result)){
				$_SESSION['usuario']=$nom;
				setcookie('usuario',$nom, time()+36000);
				echo "Bienvenido ".$_SESSION['usuario'];
				mostrart("productos","idProducto","idProducto, nombre, precio"); // Liberamos los registros
				echo "<a href='salir.php'> Salir </a>";}
			else{
				echo "Usuario o contraseña incorrectos";
				echo "<a href='index.php'> Volver a intentar </a>";
			}
			mysqli_free_result($result); // Liberamos los registros
			mysqli_close($link); 	
		}
		else {
			echo "Usuario o contraseña vacios";
			echo "<a href='index.php'> Volver a intentar </a>";
		}	
	}
	else {
?>
<form action="index.php" method='post'>
    Nombre: <input type="text" name="nom"><br>
	contraseña: <input type="text" name="pass"><br>
    <input type="submit" name="enviar">
</form>
<?php }}
?>