<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</head>

<body>
<?php
include_once 'crearBD.php';
if (isset($_GET['primero'])) {
    crearBD();
}
if (isset($_GET['segundo'])) {
    mostrarlibros(conexionBiblio());
}
if (isset($_GET['tercero'])) {
    mostrarEditorial(conexionBiblio());
}
if (isset($_GET['quinto'])) {
    
    prestadosDevuletos(conexionBiblio());
}
if (isset($_GET['sexto'])) {
    
    noDevueltos2013(conexionBiblio());
}
  
if (isset($_GET['septimo'])) {
    
    nLibrosMateria(conexionBiblio());
}                                  
?>
    <br>
    <center>
<a href="index.php?primero=true">
    <input class="btn btn-primary m-1" name="primero" type="button" value="1ª Creacion BD biblioteca">

</a><br>
<a href="index.php?segundo=true">
    <input class="btn btn-primary m-1" name="segundo" type="button" value="2ª Consulta de la tabla 'libros'">

</a><br>
<a href="index.php?tercero=true">
    <input class="btn btn-primary m-1" name="tercero" type="button" value="3ª Libros de la editorial 'Alfaguara'">

</a><br>
<a href="index.php?cuarto=true">
    <input class="btn btn-primary m-1" name="cuarto" type="button" value="4ª Propiedades y flags de algunos campos">

</a><br>
<a href="index.php?quinto=true">
    <input class="btn btn-primary m-1" name="quinto" type="button" value="5ª Libros prestados y libros devueltos">

</a><br>
<a href="index.php?sexto=true">
    <input class="btn btn-primary m-1" name="sexto" type="button" value="6ª Libros no devueltos en el año 2013">

</a><br>
<a href="index.php?septimo=true">
    <input class="btn btn-primary m-1" name="septimo" type="button" value="7ª Número de libros por registro">

</a>
</center>  
</body>
</html>