 <?php
     
     

        function resultado($totalAprobados,$totalReprobados,$alumnos){
            echo "<table class='table'><tr><td>Total de alumnos</td><td>Total de aprobados</td><td>Total de desaprobados</td></tr>";
            echo "<tr><td>".count($alumnos)."</td><td>".$totalAprobados."</td><td>".$totalReprobados."</td></tr></table>";
            
            echo "<br><table class='table'><tr><td>Alumno con mayor promedio</td><td>Alumno con menor promedio</td></tr>";
            echo "<tr><td>".$totalAprobados."</td><td>".$totalAprobados."</td></tr></table>";
        
        
        
        }
         

        resultado($totalAprobados,$totalReprobados,$lastPosicion);
    ?>