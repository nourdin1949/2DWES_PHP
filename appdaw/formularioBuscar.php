<body>

<!doctype html>

<html>

<head>

<meta charset="utf-8"> 

<title>Empresa-Departamento</title> 

</head> 
<?php

    include_once 'datos.php';


    //Crear un array para almacenar los departamentos (únicos)
    $departamentos = array();
    //$contador=0;
    //Recorrer el array de empresas
    foreach($datos as $empresa){
        $empresa['NOMBRE'];
        
        // Por cada empresa pregunto si el array departamento cotiene el departamento
        if(!in_array($empresa['NOMBRE'],$departamentos)){
            ///$departamentos[$contador] = $empresa['DEPARTAMENTO'];
            //$contador++;
            array_push($departamentos,$empresa['NOMBRE']);
        }

        // Sino lo contiene, se añade el departamento al array 


        //Si lo contiene, no hago nada

    } // Fin del foreach de empresas

    //print_r($departamentos);

    echo "<select name='departamento'>";
    
    foreach($departamentos as $departamento){
        echo "<option value='".$departamento."'>".$departamento."</option>";
    }

    echo "</select>";


?>

<body>

<form method="post" action="buscarDatosArray.php">

<p>El departamento: <?php 
     echo "<select name='departamento'>";
    
     foreach($departamentos as $departamento){
         echo "<option value='".$departamento."'>".$departamento."</option>";
     }
 
     echo "</select>";
    ?>
</p>

<p><input type="submit" value="Enviar" name="B1"></p>

</form>

</body>

</html>