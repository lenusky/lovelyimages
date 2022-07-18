<?php
session_start();
   $id_usuario=$_SESSION["id"];
   $titulo=$_POST['titulo'];
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
                  $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'root';
        $dbName     = 'database';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Conexion fallida: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into images (id_usuario,titulo,image, created) VALUES ('$id_usuario','$titulo','$imgContent', '$dataTime')");
        if($insert){
            echo "Imagen guardada correctamente.";
              echo"<a href='imagenes.php'><button type='button' style='background-color:orange;color:white'>Volver</button></a>";
        }else{
            echo "Error, intentelo de nuevo.";
        } 
    }else{
        echo "Por favor, seleccione una imagen.";
    }

?>