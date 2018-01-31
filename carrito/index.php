<?php
session_start();
if (isset($_SESSION['nombre'])){
	header("Location: principal.php");
}
else{
	if (isset($_REQUEST['enviar'])){
		$nom=$_REQUEST['nom'];
		$pass=$_REQUEST['pass'];
		require ('conexion.php');
		$consul="SELECT * FROM clientes where nombre='".$nom."' and pwd='".$pass."'";
		$result = mysqli_query($link,$consul);
		if ($row = mysqli_fetch_array($result)){
			$_SESSION['nombre']=$nom;
			$_SESSION['dni']=$row['dniCliente'];
			setcookie('ctotal', 0, time()+36000);
			header("Location: principal.php");
		}
		else{
			echo "Usuario o contraseña incorrectos";
			echo "<a href='index.php'> Volver a intentar </a>";
		}
	mysqli_free_result($result); // Liberamos los registros
	mysqli_close($link); 	
	}
	else{
		echo "<form action='index.php' method='post'>";
		echo "Nombre: <input type='text' name='nom'><br>";
		echo "contraseña: <input type='text' name='pass'><br>";
		echo "<input type='submit' name='enviar' value='Enviar'>";
		echo "</form>";
	}
} 
?>