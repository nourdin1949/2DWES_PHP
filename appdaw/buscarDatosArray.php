<?php

    include_once 'datos.php';

if(isset($_POST['departamento'])){
    $encontrado = $_POST['departamento'];
}


$contadorEmpleados=0;
$contador =0;
echo "<table><tr><td>Departamentos</td><td>Empleados</td></tr>";
 foreach($datos as $empresa){
    
    if($empresa['NOMBRE']==$encontrado){
        echo "<tr><td>". $empresa['DEPARTAMENTO']."</td><td>". $empresa['EMPLEADOS']."</td><tr>";
        $contadorEmpleados += $empresa['EMPLEADOS'];
        $contador++;
    }
}
echo "<tr><td></td><td>".$contadorEmpleados."</td></tr>";
echo "</table>";
 echo "Existen " . $contador ." departamentos de la empresa " .$encontrado;
?>