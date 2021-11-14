<?php 


function conexion (){
    $nombreServidor ="localhost";
        $nombreusuario ="root";
        $contrasenia= "";
     $conexion = new mysqli($nombreServidor,$nombreusuario,$contrasenia);
     return $conexion;
}

function conexionBiblio (){
    $nombreServidor ="localhost";
        $nombreusuario ="root";
        $contrasenia= "";
     $conexion = new mysqli($nombreServidor,$nombreusuario,$contrasenia,'biblioteca');
     return $conexion;
}



?>