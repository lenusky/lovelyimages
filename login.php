<!DOCTYPE html>
<?php
// Inicia sesion
session_start();
 
// Comprueba si el usuario está logueado, si es asi le redirecciona a la pagina imagenes
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: logueado.html");
  exit;
}
 
// Incluye archivo de conexion
require_once "conexion.php";
 
// Definir variables e inicializar con valores vacíos
$username = $password = "";
$username_err = $password_err = "";
 
// Procesamiento de datos del formulario cuando se envía el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Comprobar si el nombre de usuario está vacío
    if(empty(trim($_POST["username"]))){
        $username_err = "Ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Comprobar si la contraseña está vacía
    if(empty(trim($_POST["password"]))){
        $password_err = "Ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // validar los datos de usuario
    if(empty($username_err) && empty($password_err)){
        // preparamos declaracion seleccionar los datos del usuario...
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Establecer parámetros
            $param_username = $username;
            
            // Intento de ejecutar la instrucción preparada
            if(mysqli_stmt_execute($stmt)){
                   
                // Guardar resultado
                mysqli_stmt_store_result($stmt);
                
                // Verifique si existe el nombre de usuario, si es así, verifique la contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){  
                     

                    // Vincular variables de resultado
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        
                       
                        if($password== $hashed_password){
                          
                            session_start();
                        
                            //Almacenar datos en variables de sesión
                         
                         
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirigir a la usuario a la página de imagenes
                            header("location: bienvenida.html");
                        } else{
                            // Muestra un mensaje de error si la contraseña no es válida
                            $password_err = "Contraseña incorrecta";
                            echo "$password $hashed_password";
                        }
                    }
                } else{
                    // Muestra un mensaje de error si el usuario no existe
                    $username_err = "El usuario no existe";
                }
            } else{
                echo "Algo salió mal, vuelve a intentarlo.";
            }
        }
        
        // Cierra declaracion
        mysqli_stmt_close($stmt);
    }
    
    // Cierra conexion
    mysqli_close($link);
}
?>
<html class="wide wow-animation" lang="en">

<head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Work+Sans:300,700,800%7CIBM+Plex+Sans:200,300,400,400i,600,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
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
.login-form {
		
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    </style>
</head>

<body>


    <header class="section page-header">
     
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-minimal" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                       
                        <div class="rd-navbar-panel">
                        
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1"><span></span></button>
                         <a class="rd-navbar-brand" href="index.html"><img src="images/logo-default.png" alt="" width="176" height="28" srcset="images/logo-default-352x56.png 2x" /></a>
                        </div>
                        <div class="rd-navbar-main-element">
                            <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
                               
                                  
                                     <ul class="rd-navbar-nav">
                                    
                                    <li class="rd-nav-item"><h4>Inicie sesión o regístrese para acceder a la aplicación &#8594 </h4>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="login.php"><img src="images/inicio.png"></a>
                                    </li>
                                </ul>
                                
                            </div>


                        </div>
                    </div>
                </div>

            </nav>
        </div>
    </header>
    <!-- Overlapping Screen-->
    <section class="section section-overlap bg-decorate">
        <div class="section-overlap-image" style="background-image: url(images/screens-1-1046x720.jpg)"></div>
        <div class="section-overlap-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <div class="wow-outer">
                            <h6 class="font-weight-sbold text-primary wow slideInDown">Rápido y Sencillo</h6>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <h1 class="wow-outer"><span class="font-weight-bold wow-outer"><span class="wow slideInUp">Lovely</span></span><span class="font-weight-exlight wow-outer"><span class="wow slideInUp" data-wow-delay=".1s">Images</span></span></h1>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xl-4 col-offset-1">
                        <div class="wow-outer">
                         <div class="wrapper">
	
	<div class="container">
			
		<p>Por favor, rellene sus datos.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate ahora</a>.</p>
        </form>
    </div>    
		</div>
		
	</div>
			
	</div>
				 
                </div></div></div></section>
   
    <div class="container">
        <div class="footer-standard-aside">
        
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>“Una fotografía es un secreto sobre un secreto, cuanto más te cuenta menos sabes.” Diane Arbus</span><span>&nbsp;</span>&nbsp;<br class="d-sm-none" />Un diseño&nbsp;de&nbsp;<a href="https://www.templatemonster.com/">Elena Ordiales</a></p>
        </div>
    </div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
