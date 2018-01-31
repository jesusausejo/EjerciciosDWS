<?php 
$matriz =array(
	"Alemania"=> array("pais" => "Alemania", "capital" => "Berlín", "Extensión" => "557046", "Habitantes" => "557046"),
	"Austria" => array("pais" => "Austria", "capital" => "Viena", "Extensión" => "83849", "Habitantes" => "76140000"),
	"belgica" => array("pais" => "Belgica", "capital" => "Bruselas", "Extensión" => "30518", "Habitantes" => "9932000"));

$cabecera="<table> <tr> ";
$cuerpo="";

$veces=0;
foreach ( $matriz as $item) {
	$cuerpo.="<tr>";

	foreach ( $item as $clave=>$dato){
		if ($veces==0) 
		$cabecera.= "<td>".$clave."</TD>";
		$cuerpo.= "<td>".$dato."</TD>";
	}
	$cuerpo.="</tr> \n";
	$veces=1;
}
$cabecera.="</tr>\n";
$cuerpo.="</table>";
echo $cabecera;
echo $cuerpo;
?>
