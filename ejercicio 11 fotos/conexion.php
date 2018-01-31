<?php
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db( $link,"virtualmarket");
$tildes = $link->query("SET NAMES 'utf8'");
?>