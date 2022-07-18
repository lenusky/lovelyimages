<?php
session_start();
   $id_usuario=$_SESSION["id"];
    
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'root';
    $dbName     = 'database';
    
    
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
  
    if($db->connect_error){
       die("Conexion fallida: " . $db->connect_error);
    }
    
    //selecciona imagen de base de datos
    $result = $db->query("SELECT image FROM images WHERE id= {$_GET['id']}");
 
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //coloca imagen en contenedor
         header("Content-type: image/jpg"); 
        header("Content-type: image/gif"); 
        header("Content-type: image/png"); 
        header("Content-type: image/svg"); 
        
        echo $imgData['image']; 
      
    }else{
        echo 'Imagen no encontrada...';
    }

?>