<?php
function campo ($nombre){

	$texto="$nombre <input type='text' name='$nombre'>";
	return $texto;
}

function maximo ($n1,$n2,$n3){
	if ($n1>$n2) $maxi=$n1;
	else $maxi=$n2;
	if($n3>$maxi) $maxi=$n3;
	return $maxi;
}

function vacio ($text){
	if (trim($text)=='0' || !empty(trim($text))) return False;
	else return True;
	}