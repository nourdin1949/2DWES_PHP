<?php
require_once 'cabecera.php';
?>
<body>

<div class="container">
  <?php echo"<h2>Aplicacion Web</h2>";
  
  
    $Usuario = "Alejandro";
    $curso = "2DAW";
  ?>


<p>Usuario:<?php echo $Usuario.'-'.$curso;
echo "<br>";
$valores = [10,20,40];
//print_r($valores);
    for($i=0; $i<3;$i++){
       // echo $valores[$i].' ';
    }

    $array = [['Juan',"Pedro","Maria"],

    [10, 20, 30],

    [100, 200, 300]];


  

// Mostramos mensaje con el índice de cada  array y los valores que contiene
echo '<table class="table">
    <thead>
    <tr>
        <th>Empelado</th>
        <th>Cuota 1</th>
        <th>Cuota 2</th>
    </tr>
</thead>';

for($i=0; $i<count($array); $i++) {
    echo '<tr>';
    
    for($x=0; $x<count($array[$i]); $x++) {

     
      echo '<td>'. $array[$i][$x].'</td>';
     
   

    } // fin del bucle inferior
    echo "<td><a href='#' class='btn btn-info' role='buutton'>Editar</a> </td> 
    <td><a href='#' class='btn btn-danger' role='buutton'>Eliminar</a> </td>";
echo '</tr>';
    
  } // fin del bucle superior

echo '</tbody>
</table>';


?>

</p>
</body>
</html>
