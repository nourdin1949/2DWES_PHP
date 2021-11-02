<?php

//Abrir el archivo

 $archivo = 'registros.txt';

 $abrir = fopen($archivo, 'a');


// informacion a insertar
$info = "Registro realizado el ".date("d/m/Y - G:i:s").chr(13).chr(10);
 //Enviar información de los productos

 fwrite($abrir, $info);



//Cerrar el archivo

 fclose($abrir);

?>