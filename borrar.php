<?php
session_start();
   require_once "conexion.php";

$imgborrar=$_POST['borrar'];
if(isset($_POST["borra"])){

 $query="DELETE FROM images WHERE id='".$imgborrar."'";
 if ($link->query($query) === TRUE) {
 // Si ha sido correcta
 echo "<br /><h2>Imagen borrada correctamente</h2>";
  echo"<a href='imagenes.php'><button type='button' style='background-color:orange;color:white'>Volver</button></a>";
 } else {
    // Si NO ha sido correcta
    echo "Error al borrar la imagen." . $query . "<br>" . $link->error; 
       echo"<a href='php-ficha-clientes.php'><button type='button' style='background-color:orange;color:white'>Volver</button></a>";

   }}

 mysqli_close($link);

?>