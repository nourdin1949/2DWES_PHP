<?php
require_once 'cabecera.php';
$cantidad=0;
$cantidades = array();


$comidas = array(
    
    array('id'=>1,"NOMBRE"=>"Ensalada de Frutas","valor"=>10),
    array('id'=>2,"NOMBRE"=>"Hamburguesa","valor"=>13),
    array('id'=>3,"NOMBRE"=>"Bocadillo","valor"=>7),
    array('id'=>4,"NOMBRE"=>"Sandwich","valor"=>5),);

    foreach($comidas as $comida){
        
            
            $cantidad=$_POST['cantidad_'.$comida['id']];
            $datos = array();
            $datos['cantidad']=$cantidad;
            $datos['precio_cantidad']=(int)$cantidad*(int)$comida['valor'];
            $cantidades[$comida['id']]=$datos;
        

    }
?>

<form action="index.php" method="post">
<p> Cliente: <input type="text" name="precio" value="<?php  ?>" />   




<?php 





    echo "<table class='table'><tr><td>Lista de Productos </td><td>Cantidad</td><td>Precio €</td><td>Subtotal</td></tr>";

    foreach($comidas as $comida){
        echo $comida['id'];
        echo "<tr><td>".$comida["NOMBRE"]."</td><td><input type='text' name='cantidad_'".$comida['id']."' value='".$cantidades[$comida['id']]['cantidad']."'/></td><td>".$comida["valor"]."</td><td>".$comida["valor"]*$cantidades[$comida['id']]['cantidad']."</td></tr>";
 
    

    }

    echo "</table>";
?>




<input class="btn btn-primary" type="submit" value="Finalizar Venta" >



</form>
</body>
</html>