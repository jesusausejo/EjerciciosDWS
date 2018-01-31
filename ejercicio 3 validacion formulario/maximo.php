<?php
$error=False;
$texterror['num1']="";
$texterror['num2']="";
$texterror['num3']="";
if (isset($_POST['enviar'])) {

	if (!trim($_POST['num1']=="")) 
		$n[1]=$_POST['num1'];
	else {
		$error=True;
		$texterror['num1']="El num1 no puede estar vacio";
	}
	if (!trim($_POST['num2'])=="")
		$n[2]=$_POST['num2'];
	else {
		$error=True;
		$texterror['num2']="El num2 no puede estar vacio";
	
	}
	if (!trim($_POST['num3'])=="") 
		$n[3]=$_POST['num3'];
	else {
		$error=True;
		$texterror['num3']="El num3 no puede estar vacio";
	}
	if (!$error){
		$max=max($n);
		$min=min($n);
		echo "El número mayor es: $max<br>";
		echo "El número menor es: $min";
	}
}
if (($error) || (!isset($_POST['enviar']))){

echo "<form action='maximo.php' method='post'> ";
echo "	<input type='text' name='num1'>".$texterror['num1']."<br>";
echo "	<input type='text' name='num2'>".$texterror['num2']."<br>";
echo "	<input type='text' name='num3'>".$texterror['num3']."<br>";
echo "	<input type='submit' name='enviar'><br>";
echo "</form>";

}
?>