<?php
function cesta ($datos,$tipo){
	$StringHtml="<TABLE><TR><TH>Id</TH><TH >Nombre</TH><TH>Precio</TH><TH>Cantidad</TH><TH>Importe</TH></TR>";
	$suma=0;
	$importe=0;
	foreach ($datos['id'] as $i=>$valor) { 
		if ($datos['cantidad'][$i]>0) {		
			$importe=$datos['precio'][$i]*$datos['cantidad'][$i];
			$suma+=$importe;
			$StringHtml.="<TR><TD>".$datos['id'][$i]."</TD><TD >".$datos['nombre'][$i]."</TD><TD>".$datos['precio'][$i]."</TD><TD>";
			if ($tipo==0) {
				$StringHtml.=$datos['cantidad'][$i];
			}else{
				$StringHtml.="<input type='number' name='mcantidad[$i]' value='".$datos['cantidad'][$i]."'>";
			}
			$StringHtml.="</TD><TD>$importe</TD></TR>";
		}
	}
	$StringHtml.="<TR><TD></TD><TD ></TD><TD></TD><TD>TOTAL</TD><TD>$suma</TD></TR></table><br>";
	return $StringHtml;
}

function vercookie (){
	$datos['id']=$_COOKIE['cid'];
	$datos['nombre']=$_COOKIE['cnombre'];
	$datos['precio']=$_COOKIE['cprecio'];
	$datos['cantidad']=$_COOKIE['ccantidad'];
	return $datos;
}
?>