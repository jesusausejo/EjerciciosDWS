<?php

if (isset($_COOKIE['usuario'])){
	echo "Bienvenido ".$_COOKIE['usuario'];
	echo "<a href='verclientes.php'> ver clientes </a>";
	echo "<br><br><a href='salir.php'> Desconectar </a>";
}
else{
	if (isset($_POST['enviar'])) {
		if (isset($_POST['nom']) && isset($_POST['pass'])){
			$nom=$_POST['nom'];
			$pass=$_POST['pass'];
			include ("conexion.php");
			$consul="SELECT * FROM clientes where nombre='".$nom."' and pwd='".$pass."'";
			$result = mysqli_query($link,$consul);
			if ($row = mysqli_fetch_array($result)){
				setcookie('usuario',$nom, time()+36000);
				header("Location: verclientes.php");}
			else{
				echo "Usuario o contraseña incorrectos";
				echo "<a href='index.php'> Volver a intentar </a>";
			}
			mysqli_free_result($result); // Liberamos los registros
			mysqli_close($link); 	
		}
		else header("Location: index.php");	
	}
	else {
?>
<form action="index.php" method='post'>
    Nombre: <input type="text" name="nom"><br>
	contraseña: <input type="text" name="pass"><br>
    <input type="submit" name="enviar">
</form>
<?php }} ?>