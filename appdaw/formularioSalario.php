<!DOCTYPE html>

<html>

 <head>

 <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <title>Formulario</title>


 </head>

 <body>

<?php
$horas="";
$empleado="";
$valorHora="";
$porcentaje=0.15;
    if(isset($_POST['empleado'])){
        $empleado = $_POST['empleado'];
    }
    if(isset($_POST['horas'])){
        $horas = $_POST['horas'];
    }
    if(isset($_POST['categoria'])){
        $idCategoria = $_POST['categoria'];
    }
    if(isset($_POST['categoria'])){
        $idCategoria = $_POST['categoria'];
    }

    
    $categorias = array(
    
        array('id'=>1,"NOMBRE"=>"Jefe","valor"=>50,"valorExtra"=>60),
        array('id'=>2,"NOMBRE"=>"Administrativo","valor"=>30,"valorExtra"=>40),
        array('id'=>3,"NOMBRE"=>"Operario","valor"=>15,"valorExtra"=>25),
        array('id'=>4,"NOMBRE"=>"Becario","valor"=>6),"valorExtra"=>16);

  function calcularBruto($horas,$valorHora){
    $salario_bruto = $valorHora* $horas;
    return $salario_bruto;
  }    

  function calcularDescuento($salario_bruto,$porcentaje){
    $descuento = $$salario_bruto * $porcentaje;
    return $descuento;
  }    

function calcularSalarioNeto($salario_bruto,$descuento){
    $salario_neto = $salario_bruto - $descuento;
    return $salario_neto;
}

?>


<?php

//Abrir el archivo

 $archivo = 'claves.txt';

 $abrir = fopen($archivo, 'w');


 //Información de los productos

 // Descripción precio stock

 $producto1 = 'Lavadora industrial-1500-20'.chr(13).chr(10);

 $producto2 = 'Televisión 40 pulgadas-3500-30'.chr(13).chr(10);

 $producto3 = 'Frigorífico  2 m  - 5500 - 10';


 //Enviar información de los productos

 fwrite($abrir, $producto1);

 fwrite($abrir, $producto2);

 fwrite($abrir, $producto3);


//Cerrar el archivo

 fclose($abrir);

?>







<div class="container">

<form action="formularioSalario.php" method="post">  


    <p> Empleado: <input type="text" name="empleado" value="<?php echo $empleado?>"/>  

    </p>
    <p> Horas: <input type="text" name="horas" value="<?php echo $horas?>"/>
    </p>
    <p><input class="btn btn-danger" type="submit" value="limpiar" >
    <input class="btn btn-primary" type="submit" value="Calcular" ></p>
    <p>  

        Categoria

        <select name="categoria" size="1">

        <?php 
            foreach($categorias as $categoria){
                $seleccion ="";
                if($idCategoria == $categoria['id']){
                    $seleccion ='selected';
                    $valorHora = $categoria["valor"];
                    
                    
                }
                echo "<option value='".$categoria["id"]."'".$seleccion .">".$categoria["NOMBRE"]."</option>";
            }
        ?>
         

        </select>

    </p>
    <p> Salario Bruto <?php  if($horas==""){
       echo $salario_bruto =0;}else{
         echo   calcularBruto($horas,$valorHora);}?>€</p>
    <p> Descuento <?php  if($horas==""){
       echo $descuento =0;}else{
         echo   calcularDescuento($salario_bruto,$porcentaje);}?>€</p>
    <p> Salario Neto <?php  if($horas==""){
       echo $salario_neto =0;}else{
         echo   calcularSalarioNeto($salario_bruto,$descuento);}?>€</p>

    


</p>

<?php 

        function insertarDatos(){

        }
?>

</form>
</div>
</body>
</html>>