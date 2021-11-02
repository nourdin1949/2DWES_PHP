<?php

 //Nombre del archivo

 $filename = "formatos.txt";


 if (!file_exists($filename)){
    echo 'Archivo NO existe..!!';
 }else{
   //Abriendo en forma de lectura
    if(filesize($filename)>0){
        readfile($filename);
    }else{
         echo "Fichero está vacío";
    }
 }
 //Leer y mostrar el contenido



?>