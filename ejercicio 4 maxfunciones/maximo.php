<?php
include('funciones.php');
$error=False;
$texterror['num1']="";
$texterror['num2']="";
$texterror['num3']="";
if (isset($_POST['enviar'])) {

	if (vacio($_POST['num1'])) 
		{
		$error=True;
		$texterror['num1']="El num1 no puede estar vacio";
		}
	else $n1=$_POST['num1'];

	if (vacio($_POST['num2']))
		{
		$error=True;
		$texterror['num2']="El num2 no puede estar vacio";
		}
	else $n2=$_POST['num2'];

	if (vacio($_POST['num3'])) 
		{
		$error=True;
		$texterror['num3']="El num3 no puede estar vacio";
		}
	else $n3=$_POST['num3'];
	if (!$error){
		echo "El número mayor es: ".maximo($n1,$n2,$n3)."<br>";
		
	}
}
if (($error) || (!isset($_POST['enviar']))){

echo "<form action='maximo.php' method='post'> ";
echo campo('num1')." ".$texterror['num1']."<br>";
echo campo('num2')." ".$texterror['num2']."<br>";
echo campo('num3')." ".$texterror['num3']."<br>";
echo "	<input type='submit' name='enviar'><br>";
echo "</form>";

}
?>