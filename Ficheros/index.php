


<?php

 //Definición del nombre del archivo

 $archivo = "claves.txt";


 //Verificando la existencia del archivo

 if (!file_exists($archivo)){
    echo 'Archivo NO existe..!!';
 }else{
   //Abriendo en forma de lectura
    if(filesize($archivo)>0){
         $abrir = fopen($archivo, "r");
         //Obtener el contenido a partir de la lectura
         $contenido = fread($abrir, filesize($archivo));
         //Cerramos el fichero;
         fclose($abrir);
         //Imprimir el contenido del archivo
         echo $contenido;
    }else{
         echo "Fichero está vacío";
    }
 }

?>