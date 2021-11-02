<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informe Notas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<?php
$totalAlumnos =0;
$totalAprobados=0;
$totalReprobados=0;
$media =0;

 $alumnos = array(
    
    array('id'=>1,"alumno"=>"Juan Pedro","nota"=>array(5,6,3,4)),
    array('id'=>2,"alumno"=>"luisa Martin","nota"=>array(5,6,0,2)),
    array('id'=>3,"alumno"=>"Sofia Rodriguez","nota"=>array(5,8,5,2)),
    array('id'=>4,"alumno"=>"Raul Castañera","nota"=>array(5,6,3,9)));
?>
<h1>Informe de Notas- Indexado</h1>



<table class="table"> 
    <tr>
        <td>Nº Orden</td>
        <td>Alumno</td>
        <td>Promedio</td>
    </tr>

    <?php
    function mostrarTablaAlumnos($alumnos,$totalAprobados,$totalReprobados){
        foreach($alumnos  as $alumno){
            
           $media= calcularMedia($alumno);
           aprobadosSINO($media,$totalAprobados,$totalReprobados,$alumnos);
            echo '<tr><td>'.$alumno['id'].'</td> 
                <td>'.$alumno['alumno'].'</td> 
                <td>'.$media.'</td>
                <td><a href="mostrarDetallesAlumno.php?id='.$alumno['id'].'">Ver detalles</a></td></tr>';
        }
    }
   
    function aprobadosSINO($media,$totalAprobados,$totalReprobados,$alumnos){
        foreach($alumnos  as $alumnos){
            if($media>=10){
                $totalAprobados += 1;
            }else{
                $totalReprobados += 1;
            }
        }
    }

        function calcularMedia($alumnos){
            $promedio=0;
            for($i=0; $i<count($alumnos['nota']);$i++){
            $promedio += $alumnos['nota'][$i];
            }
            return round($promedio/count($alumnos['nota']));
        }
        
        
echo mostrarTablaAlumnos($alumnos);

    ?>
</table>
   
    <a class="btn btn-primary"  href="./mostrar.php"  >Mostrar Resumen</a>

    
</body>
</html>