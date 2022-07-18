<?php
session_start();
   require_once "conexion.php";

$resultado=$_POST['editar'];

if(isset($_POST["edita"])){
echo "caca1";
$query="SELECT image FROM images WHERE id='".$resultado."'";
 

$result = $link->query($query);

// obtenemos el numero de registros

 $count = mysqli_num_rows($result);

// si ha encontrado un registro es que existe
if ($count >0 ) {
   
   $registro = mysqli_fetch_assoc($result);
    $image_data=$registro['image'];


 echo"<!DOCTYPE html>
<head>
    <!-- Add CSS file -->
    <link rel='stylesheet' href='demo.css' />
  
    <!-- Add JQuery -->
    <script src=
'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
    </script>
  
    <!-- Add JavaScript file -->
    <script>
        $(document).ready(function () {
            $('.fit-val').change(main);
        });
    </script>
  
    <script src='demo.js'></script>
</head>
  
<body>
   <div id='main' style='display:flex'>
        <!-- Add Slider Controls -->
        <div class='range_panel'>
            <span>
                <label>GrayScale</label>
                <br />
                <input id='id1' class='fit-val' 
                    type='range' min='0' max='100' 
                    value='0' />
            </span>
  
            <span>
                <label>Blur</label>
                <br />
                <input id='id2' class='fit-val' 
                    type='range' min='0' max='10' 
                    value='0' />
            </span>
  
            <span>
                <label>Exposure</label>
                <br />
                <input id='id3' class='fit-val' 
                    type='range' min='0' max='200' 
                    value='100' />
            </span>
  
            <span>
                <label>Sepia</label>
                <br />
                <input id='id4' class='fit-val' 
                    type='range' min='0' max='100' 
                    value='0' />
            </span>
  
            <span>
                <label>Opacity</label>
                <br />
                <input id='id5' class='fit-val' 
                    type='range' min='0' max='100'
                    value='100' />
            </span>
  
            <span>
                <label>Contrast</label>
                <br />
                <input id='id6' class='fit-val' 
                    type='range' min='0' max='100'
                    value='100' />
            </span>
  
            <span>
                <label>Invert</label>
                <br />
                <input id='id7' class='fit-val'
                    type='range' min='0' max='100'
                    value='0' />
            </span>
  
            <span>
                <label>Saturate</label>
                <br />
                <input id='id8' class='fit-val' 
                    type='range' min='0' max='100' 
                    value='100' />
            </span>
        </div>
       
    <div class='image'>
     <div style='position:fixed;top:10px;right:10px' >
       <a href='imagenes.php'><img src='images/cierre.jpg' style='width:25%'>
</a> </div>
    <img src=
        'ver.php? id=".$resultado."' alt='Sin Imagen'  style='border: 10px grey groove; '>
        
          <img class='image_main'  src=
        'ver.php? id=".$resultado."' alt='Sin Imagen'  style='border: 10px grey groove;' >
        
        </div>
    </div>

    
                </body>
</html>";
}}

 mysqli_close($link);

?>