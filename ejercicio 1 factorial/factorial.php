<body>
<?php define("numero", 4);  ?>
<table>
	<?php
	$acum=1; 
	for ($i=numero; $i >0 ; $i--) { 
		$acum*=$i;?>
		<tr>
			<td>
			<?php echo $i;?>
			</td>
			<td>
			<?php if ($i!=numero) echo $acum;?>
			</td>
		</tr>
	<?php } ?>
</table>




</body>