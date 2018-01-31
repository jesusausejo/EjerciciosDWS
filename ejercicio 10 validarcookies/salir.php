<?php

echo "Gracias por usar nuestra aplicación. Hasta luego Lucas";
setcookie('usuario',"", time()-36000);
echo "<br><br><a href='index.php'> Volver a Entrar </a>";
?>