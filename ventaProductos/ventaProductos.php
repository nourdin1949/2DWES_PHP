<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta prodcuto</title>
</head>
<body>

<?php

$precio=(int)"";
$cantidad =(int)"";
$cuota=(int)"";
    

    if(isset($_POST["cantidad"])){
        $cantidad = $_POST["cantidad"];
    }

    if(isset($_POST["producto"])){
        $idProducto = $_POST["producto"];
    } 
    
    if(isset($_POST["cuota"])){
        $cuota = $_POST["cuota"];
    } 
    $productos = array(
    
        array('id'=>1,"NOMBRE"=>"Frigorifico","valor"=>350),
        array('id'=>2,"NOMBRE"=>"Lavadora","valor"=>200),
        array('id'=>3,"NOMBRE"=>"Lavavajillas","valor"=>120),
        array('id'=>4,"NOMBRE"=>"Tostadora","valor"=>25,));

?>

<form action="ventaProductos.php" method="post"> 

<p>  

Producto

<select name="producto" size="1">

<?php 
    foreach($productos as $producto){
        $seleccion ="";
        if($idProducto == $producto['id']){
            $seleccion ='selected';
            $precio = $producto["valor"];
            
            
        }
        echo "<option value='".$producto["id"]."'".$seleccion .">".$producto["NOMBRE"]."</option>";
    }

    
?>
 

</select>



<p> Precio: <input type="text" name="precio" value="<?php echo $precio ?>" />   
<p> Cantidad: <input type="text" name="cantidad" value="<?php echo $cantidad ?>" /> 
<?php $total = $precio*$cantidad; ?>
<p> Total: <input type="text" name="total"  value="<?php echo $total ?>" />   

</p>

<p>  

Cuota

<select name="cuota" size="1">

<?php 
    for($i=1;$i<=12;$i++){
        $seleccion ="";
        if($i == $cuota){
            $seleccion ='selected';
        }
        echo "<option value='".$i."'".$seleccion .">".$i."</option>";
    }

    

    
?>
</select>


<?php


    for($i=1; $i<=$cuota;$i++){
        echo "<p>Cuota ".$i."= ".($total/$cuota) ."€ </p>";
    }

?>
<p>

</p>
<?php 
    if($precio>0 && $total==0){
        echo '<p><input class="btn btn-primary" type="submit" value="Calcular Total" ></p>';
    }
    if($precio==0){
        echo '<p><input class="btn btn-danger" type="submit" value="Obtener precio" ></p>';
    }
    if($total>0){
        echo '<p><input class="btn btn-danger" type="submit" value="Calcular financiazion" ></p>';
    }
?>
    <input class="btn btn-primary" type="reset" value="limpiar" ></p>
</form>



</body>
</html>