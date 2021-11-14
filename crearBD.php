<?php 
     include_once 'conexion.php';
    

     function crearBD(){
         $conexion = conexion();
 
     if($conexion->error){
         die("Conexion fallida ".$conexion->error );
     }else{
     echo "Se ha establecido correctamente la conexion.<br>Los datos de conexion son: <br>El servidor:".
     "<br>EL usuario:<br>La contraseña: ";
     }
 $sql='drop database IF EXISTS biblioteca';

     if($conexion->query($sql)===true){
         $sql = "CREATE DATABASE IF NOT EXISTS biblioteca  ";
         echo "<br>Eliminada con exito";
 
         $conexion->query($sql);
     }
     if($conexion->query($sql)===true){
         //$conexion = new mysqli($nombreServidor,$nombreusuario,'biblioteca');
         mysqli_select_db($conexion,'biblioteca');
         $tabla = "drop table if exists centros";
         $conexion->query($tabla);
         $tabla ="CREATE TABLE IF NOT EXISTS centros (
 
             CodCentro varchar(8) NOT NULL DEFAULT '' ,
           
             Tipo text ,
           
             DtoInspeccion text ,
           
             Centro text ,
           
             Domicilio text ,
           
             CodPostal text ,
           
             Localidad text ,
           
             Telefono text ,
           
             Zona text ,
           
             AreaT text ,
           
             PRI tinyint(1) ,
           
             ESO tinyint(1) ,
           
             BAC tinyint(1) ,
           
             Publico tinyint(1) ,
           
             PRIMARY KEY (CodCentro)
           
           );";
         $conexion->query($tabla);
         $tabla = "drop table if exists libros";
         $conexion->query($tabla);
         $tabla="CREATE TABLE IF NOT EXISTS libros (
         
           Autor varchar(20) NOT NULL DEFAULT '' ,
         
           Titulo varchar(50) NOT NULL DEFAULT '' ,
         
           Editorial varchar(20) ,
         
           Anno_Publica year(4) DEFAULT '2000' ,
         
           Paginas int(4) unsigned ,
         
           Precio_euros float(5,3) DEFAULT '0.000' ,
         
           Prestado set('S','N') DEFAULT 'N' ,
         
           Materia enum('FIL','LIT','MAT','HIS','ART','INF','OTR','CIE','GEO') DEFAULT 'LIT' ,
         
           ISBN varchar(14) NOT NULL DEFAULT '' ,
         
           Resumen text ,
         
           Notas blob ,
         
           Registro mediumint(9) NOT NULL auto_increment,
         
           PRIMARY KEY (ISBN,Registro),
         
           UNIQUE Registro (Registro),
         
           KEY ISBN_2 (ISBN),
         
           KEY Titulo (Titulo)
         
         );";
         $conexion->query($tabla);
         $tabla = "drop table if exists prestados";
         $conexion->query($tabla);
         $tabla="CREATE TABLE IF NOT EXISTS prestados (
         
           registro mediumint(9) unsigned NOT NULL auto_increment,
         
           reg_libro mediumint(9) unsigned NOT NULL DEFAULT '0' ,
         
           reg_usu mediumint(9) unsigned NOT NULL DEFAULT '0' ,
         
           fecha_pres datetime ,
         
           fecha_dev datetime ,
         
           notas text ,
         
           PRIMARY KEY (registro),
         
           UNIQUE FieldName (registro)
         
         );";
         $conexion->query($tabla);
         $tabla = "drop table if exists usuarios";
         $conexion->query($tabla);
         $tabla="CREATE TABLE IF NOT EXISTS usuarios (
         
           Nombre varchar(15) NOT NULL DEFAULT '' ,
         
           Apellidos varchar(25) NOT NULL DEFAULT '' ,
         
           DNI varchar(8) NOT NULL DEFAULT '' ,
         
           Fecha_nacim date ,
         
           Domicilio varchar(35) ,
         
           Localidad varchar(30) ,
         
           Provincia varchar(25) ,
         
           Sueldo_euros float(10) DEFAULT '0.000' ,
         
           Telefono varchar(10) DEFAULT '0' ,
         
           E_mail varchar(40) ,
         
           Notas text ,
         
           Registro mediumint(9) unsigned NOT NULL auto_increment,
         
           PRIMARY KEY (Registro),
         
           UNIQUE Registro (Registro)
         
         );";
         $conexion->query($tabla);
         echo "erroro en el insetar";
         insertarCentros($conexion);
 
         insertarLibros($conexion);  
         insertarPrestamos($conexion);
         
         insertarUsuarios($conexion);
   
         
 
         echo "La base de datos \"biblioteca\" se ha creado correctamente y sus tablas corespondientes";
     }else{
         echo "fallo la creacion de la base de datos ". $conexion->error;
     }}
 function insertarCentros($conexion){
     $archivo = fopen('datosCentros.ini','r');
     while ($linea = fgets($archivo )) {
     
         $conexion->query($linea);
     }
     fclose($archivo);
 }
 
 function insertarPrestamos($conexion){
     $archivo = fopen('datosPrestamos.ini','r');
 
     while ($linea = fgets($archivo )) {
         $conexion->query($linea);   
     }
     fclose($archivo);
 }
 
 function insertarUsuarios($conexion){
     $archivo = fopen('datosUsuarios.ini','r');
 
     while ($linea = fgets($archivo )) {
             $conexion->query($linea);
     }
     fclose($archivo);
 }
 
 function insertarLibros($conexion){
     $archivo = fopen('datosLibros.ini','r');
     while ($linea = fgets($archivo )) {
         $conexion->query($linea);
     }
     fclose($archivo);
 }
 
 
 
  
   // verificas que si llegue el parámetro que le estas enviando
 
 
  function mostrarlibros($conexion){
      $sql = "SELECT Autor,Titulo FROM libros";
     
     $query = $conexion->query($sql);
                 echo "<table class='table'><tr><td>Autor</td><td>Titulo</td></tr>"; 
    while ($valores = mysqli_fetch_array($query)) {
                        
    echo '<tr><td>'.$valores['Autor'].'</td><td>'.$valores['Titulo'].'</td></tr>';
    }
    echo '</table>';
     
  }
  function mostrarEditorial($conexion){
    $sql = "SELECT Autor,Titulo, Editorial FROM libros where Editorial='Alfaguara'";
   
   $query = $conexion->query($sql);
               echo "<table class='table'><tr><td>Autor</td><td>Titulo</td><td>Editorial</td></tr>"; 
  while ($valores = mysqli_fetch_array($query)) {
                      
  echo '<tr><td>'.$valores['Autor'].'</td><td>'.$valores['Titulo'].'</td><td>'.$valores['Editorial'].'</td></tr>';
  }
  echo '</table>';
   
}

function prestadosDevuletos($conexion){

    $sql = "SELECT fecha_pres,fecha_dev FROM prestados WHERE  fecha_pres!='' and fecha_dev!=''";
    $query = $conexion->query($sql);
    echo "<table class='table table-striped'><thead><tr><td>Fecha Préstamo</td><td>Fecha devolucion</td></tr></thead><tbody>"; 
while ($valores = mysqli_fetch_array($query)) {
   
echo '<tr><td>'.$valores['fecha_pres'].'</td><td>'.$valores['fecha_dev'].'</td></td></tr>';
}
echo '</tbody></table>';

}

function noDevueltos2013($conexion){

    $sql = "SELECT fecha_pres,fecha_dev FROM prestados WHERE  fecha_dev NOT BETWEEN '2013-01-01 00:00:00' AND '2013-12-31 00:00:00'";
    $query = $conexion->query($sql);
    echo "<table class='table table-striped'><thead><tr><td>Fecha Préstamo</td><td>Fecha devolucion</td></tr></thead><tbody>"; 
while ($valores = mysqli_fetch_array($query)) {
   
echo '<tr><td>'.$valores['fecha_pres'].'</td><td>'.$valores['fecha_dev'].'</td></td></tr>';
}
echo '</tbody></table>';

}

function nLibrosMateria($conexion){

    $sql = "SELECT count(Titulo), Materia FROM libros group by Materia";
    $query = $conexion->query($sql);
    echo "<table class='table table-striped'><thead><tr><td>Número de libros</td><td>Materia</td></tr></thead><tbody>"; 
while ($valores = mysqli_fetch_array($query)) {
   
echo '<tr><td>'.$valores['count(Titulo)'].'</td><td>'.$valores['Materia'].'</td></td></tr>';
}
echo '</tbody></table>';

}

 
?>