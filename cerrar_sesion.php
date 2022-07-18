<?php
// inicia sesion
session_start();
 
// Uneliminamos variables
$_SESSION = array();
 
// Destrumos sesion
session_destroy();
 
// redireccionamos a pagina de login
header("location: login.php");
exit;
?>
