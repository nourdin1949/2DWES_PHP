
<?php
require_once 'index.php';     
     
     $id;
     if(isset($_GET['id'])){
     $id=$_GET['id'];
    }
     
     ?>

<table class="table"> 
    <tr>
        <td>Materia</td>
        <td>Nota</td>
        <td>Promedio</td>
    </tr>

    <?php
    function mostrarTablaAlumnos($alumnos,$id){
        foreach($alumnos  as $alumno){
            
          if($alumno['id']==$id){
            foreach($alumno["notas"]  as $notas){
                echo '<tr><td> Materia</td> 
                <td>'.$notas.'</td> ';
                
                
            }
          }
            
            
        }
    }?>

</table>