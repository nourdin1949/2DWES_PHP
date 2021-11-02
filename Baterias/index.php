
<?php 
require_once 'cabecera.php';
$codigo ="";
$tipoId ="";
$marca ="";
$carga ="";
$capacidad ="";
$ciclos ="";
    if(isset($_POST['codigo'])){
        $codigo = $_POST['codigo'];
    }
    if(isset($_POST['tipo'])){
        $tipoId = $_POST['tipo'];
    }
    if(isset($_POST['marca'])){
        $marca = $_POST['marca'];
    }
    if(isset($_POST['carga'])){
        $carga = $_POST['carga'];
    }
    if(isset($_POST['capacidad'])){
        $capacidad = $_POST['capacidad'];
    }
    if(isset($_POST['ciclos'])){
        $ciclos = $_POST['ciclos'];
    }

    $tipos = array(

        array('id'=>1,"nombre"=>"Tipo 1"),
        array('id'=>2,"nombre"=>"Tipo 2"),
        array('id'=>3,"nombre"=>"Tipo 3"),
        array('id'=>4,"nombre"=>"Tipo 4"),
    );

    $baterias = array(
            array('codigo'=>$codigo,"tipo"=>$tipoId,"marca"=>$marca,"carga"=>$carga,"capacidad"=>$capacidad,"ciclos"=>$ciclos),
    );
    print_r($baterias);

?>
<form action="index.php" method="post">  

<p> Codigo: <input type="text" name="codigo" />  </p>
<p> Tipo:  <select name="tipo" size="1">
   
<?php 
            foreach($tipos as $tipo){
                $seleccion ="";
                if($tipoId == $tipo['id']){
                    $seleccion ='selected';
                    $valorHora = $categoria["valor"];
                    
                    
                }
                echo "<option value='".$tipo["id"]."'".$seleccion .">".$tipo["nombre"]."</option>";
            }
        ?>
    </select>
<p> Marca: <input type="text" name="marca" value="<?php echo $marca?>"/>  </p>
<p> Carga: <input type="text" name="carga" value=""/>  </p>
<p> Capacidad: <input type="text" name="capacidad" value=""/>  </p>
<p> Ciclos de vida: <input type="text" name="ciclos" value=""/>  </p>
<input class="btn btn-primary" type="submit" onclick="" value="enviar" >
<?php
insertar($codigo,$marca,$tipoId,$carga,$capacidad,$ciclos );
    function insertar($codigo,$marca,$tipoId,$carga,$capacidad,$ciclos ){
       
        //Abrir el archivo

        $archivo = 'baterias.txt';

        $abrir = fopen($archivo, 'a+');

        //Información de los productos

        // Descripción precio stock

        $producto1 = $codigo.",".$tipoId .",".$marca.",".$carga.",".$capacidad.",".$ciclos.chr(13).chr(10);  

        //Enviar información de los productos

        fwrite($abrir, $producto1);

        //Cerrar el archivo

        fclose($abrir);

       
    }

    


?>
<form>
</body>
</html>