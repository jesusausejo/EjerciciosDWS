<?php
session_start();
echo "Gracias por usar nuestra aplicación. Hasta luego Lucas";
session_destroy();
echo "<br><br><a href='index.php'> Volver a Entrar </a>";
?>