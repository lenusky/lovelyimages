<?php

/* Credenciales de la base de datos.  */


 
define('DB_SERVER', 'localhost');//nombre del servidor

define('DB_USERNAME', 'root');//nombre de usuario del servidor

define('DB_PASSWORD', 'root');//contraseña del servidor

define('DB_NAME', 'database');//nombre de la base de datos

 

/* Prueba de conexión a la base de datos MySQL*/

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 

// Se verifica la conexión, si no se puede realizar se indica el error

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());


};

?>





