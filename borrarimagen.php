<?php
session_start();
require_once 'conexion.php';
 $id_usuario=$_SESSION["id"];

//------------------------------- GRABAR ---------------------------------------

//Comprueba si el cliente existe

//Prepara  la busqueda en la tabla

 $buscarListado = "select id,id_usuario,titulo,image, created from images WHERE id_usuario= '$id_usuario'";
// ejecuta y obtiene el resultad0

 $resultado = $link->query($buscarListado);

// Almacena el idiomas de registros recuperados

 $registros = mysqli_query($link, $buscarListado);

// si ha encontrado un registro es que existe
     $count = mysqli_num_rows($resultado);
if ($count >0) {

echo"<!DOCTYPE html>
<html>
<html class='wide wow-animation' lang='en'>
<meta charset='UTF-8'>
<title>Mis Imágenes</title>
<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Work+Sans:300,700,800%7CIBM+Plex+Sans:200,300,400,400i,600,700';>    <link rel='stylesheet' href='css/bootstrap.css';>
    <link rel='stylesheet' href='css/fonts.css';>
    <link rel='stylesheet' href='css/style.css';><link rel='icon' href='images/favicon.ico' type='image/x-icon'>
    meta name='format-detection' content='telephone=no'>
    <meta name='viewport' content='width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta charset='utf-8'>
    <link rel='icon' href='images/favicon.ico' type='image/x-icon'>
    <!-- Stylesheets-->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Work+Sans:300,700,800%7CIBM+Plex+Sans:200,300,400,400i,600,700'>
    <link rel='stylesheet' href='css/bootstrap.css'>
    <link rel='stylesheet' href='css/fonts.css'>
    <link rel='stylesheet' href='css/style.css'>
    
<style>

        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }

   
  td,th{
border: 5px #828690 inset;}
body{background-color: #EDEEF0}
        
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
         .grid-gallery {
  display: grid;
  grid-auto-rows: 200px;
  gap: 1rem;
  grid-auto-flow: row dense;
}

@media all and (min-width: 320px) {
  .grid-gallery {
    grid-template-columns: repeat(1, 1fr);
  }
}

@media all and (min-width: 768px) {
  .grid-gallery {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media all and (min-width: 1024px) {
  .grid-gallery {
    grid-template-columns: repeat(6, 1fr);
  }
}

.grid-gallery__item:nth-child(11n+1) {
  grid-column: span 1;
}

.grid-gallery__item:nth-child(11n+4) {
  grid-column: span 2;
  grid-row: span 1;
}

.grid-gallery__item:nth-child(11n+6) {
  grid-column: span 3;
  grid-row: span 1;
}

.grid-gallery__item:nth-child(11n+7) {
  grid-column: span 1;
  grid-row: span 2;
}

.grid-gallery__item:nth-child(11n+8) {
  grid-column: span 2;
  grid-row: span 2;
}

.grid-gallery__item:nth-child(11n+9) {
  grid-row: span 3;
}

.grid-gallery__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
        .grid-gallery__image:hover{
border-radius:50%;
-webkit-border-radius:50%;
box-shadow: 0px 0px 15px 15px #ec731e;}
-webkit-box-shadow: 0px 0px 15px 15px #ec731e;


td,th{
border: 5px white inset;}
body{background-color: #EDEEF0}


</style>
</head>

<body>


    <header class='section page-header'>
        <!-- RD Navbar-->
        <div class='rd-navbar-wrap'>
            <nav class='rd-navbar rd-navbar-minimal' data-layout='rd-navbar-fixed' data-sm-layout='rd-navbar-fixed' data-md-layout='rd-navbar-fixed' data-md-device-layout='rd-navbar-fixed' data-lg-layout='rd-navbar-static' data-lg-device-layout='rd-navbar-fixed' data-xl-layout='rd-navbar-static' data-xl-device-layout='rd-navbar-static' data-xxl-layout='rd-navbar-static' data-xxl-device-layout='rd-navbar-static' data-lg-stick-up-offset='46px' data-xl-stick-up-offset='46px' data-xxl-stick-up-offset='46px' data-lg-stick-up='true' data-xl-stick-up='true' data-xxl-stick-up='true'>
                <div class='rd-navbar-main-outer'>
                    <div class='rd-navbar-main'>
                        <!-- RD Navbar Panel-->
                        <div class='rd-navbar-panel'>
                            <!-- RD Navbar Toggle-->
                            <button class='rd-navbar-toggle' data-rd-navbar-toggle='#rd-navbar-nav-wrap-1'><span></span></button>
                            <!-- RD Navbar Brand--><a class='rd-navbar-brand' href='index.html'><img src='images/logo-default.png' alt='' width='176' height='28' srcset='images/logo-default-352x56.png 2x' /></a>
                        </div>
                        <div class='rd-navbar-main-element'>
                            <div class='rd-navbar-nav-wrap' id='rd-navbar-nav-wrap-1'>
                                <!-- RD Navbar Nav-->
                                <ul class='rd-navbar-nav'>
                                    <li class='rd-nav-item active'><a class='rd-nav-link' href='index1.html'>Inicio</a>
                                    </li>
                                    <li class='rd-nav-item'><a class='rd-nav-link' href='imagenes.php'>Mis imágenes</a>
                                    </li>
                                    <li class='rd-nav-item'><a class='rd-nav-link' href='sobremi.html'>Sobre mí</a>
                                    </li>
                                    <li class='rd-nav-item'><a class='rd-nav-link' href='contacto.php'>Contacto</a>
                                    </li>
                                    <li class='rd-nav-item'><a class='rd-nav-link' href='login.php'><img src='images/inicio.png'></a>
                                    </li>
                                  
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>

            </nav>
        </div>
    </header>
    <h1 style='font-weight:bold; text-align:center'>Mis Imágenes</h1>
<p style='text-align:center'><a href='imagenes.php'><button type='button' style='background-color:orange;color:white'>Volver</button></a></p>
      
<hr>";


while ($row= $resultado->fetch_assoc()) {

$indice=$row['id'];

        echo"   <h3 style='text-align: center'>".$row['titulo']."</h3>

<p style='text-align: center'><img src=
        'ver.php? id=".$indice."' alt='Sin Imagen' width='50%' style='border: 10px grey groove'></p>
        
<form action='borrar.php' method='post' enctype='multipart/form-data'>
<input  type='hidden' name='borrar' value='$indice'>
  <p style='text-align: center'><button type='submit' value='borra' name='borra'>Borrar</button></p>
  </form>";
}

 echo"<div class='container'>
        <div class='footer-standard-aside'>
            <!-- Rights--> <ul class='rd-navbar-nav'>
           
               
         <a class='rd-nav-item' href='cerrar_sesion.php'>Cerrar sesión</a>
                                   
            <p class='rights'><span>&copy;&nbsp;</span><span class='copyright-year'></span><span>&nbsp;</span><span>“Una fotografía es un secreto sobre un secreto, cuanto más te cuenta menos sabes.” Diane Arbus</span><span>&nbsp;</span>&nbsp;<br class='d-sm-none' />Un diseño&nbsp;de&nbsp;<a href='https://www.templatemonster.com/'>Elena Ordiales</a></p>
        </div>
        </div>
    <!-- Javascript-->
    <script src='js/core.min.js'></script>
    <script src='js/script.js'></script>";


     
                echo "</body>";
echo"</html>";
//
}
  mysqli_close($link);
exit;

