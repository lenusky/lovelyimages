<!DOCTYPE html>
<?php

// se incluye el archivo de configuración

require_once "conexion.php";

 

// Definir variables e inicializar con valores vacíos

$username = $password = $confirm_password = "";

$username_err = $password_err = $confirm_password_err = "";

 

// Procesamiento de datos del formulario cuando se envía el formulario

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Validar el nombre de usuario

    if(empty(trim($_POST["username"]))){

        $username_err = "Por favor ingrese un usuario.";

    } else{

        // Preparar la consulta

        $sql = "SELECT id FROM users WHERE username = ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            // Vincular variables a la declaración preparada como parámetros

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            

            // asignar parámetros

            $param_username = trim($_POST["username"]);

            

            // Intentar ejecutar la declaración preparada

            if(mysqli_stmt_execute($stmt)){

                /* almacenar resultado*/

                mysqli_stmt_store_result($stmt);

                

                if(mysqli_stmt_num_rows($stmt) == 1){

                    $username_err = "Este usuario ya existe.";

                } else{

                    $username = trim($_POST["username"]);

                }

            } else{

                echo "Al parecer algo salió mal.";

            }

        }

         

        // Declaración de cierre

     mysqli_stmt_close($stmt);

    }

    

    // Validar contraseña

    if(empty(trim($_POST["password"]))){

        $password_err = "Por favor ingresa una contraseña.";     

    } elseif(strlen(trim($_POST["password"])) < 6){

        $password_err = "La contraseña al menos debe tener 6 caracteres.";

    } else{

        $password = trim($_POST["password"]);

    }

    

    // Validar que se confirma la contraseña

    if(empty(trim($_POST["confirm_password"]))){

        $confirm_password_err = "Confirma tu contraseña.";     

    } else{

        $confirm_password = trim($_POST["confirm_password"]);

        if(empty($password_err) && ($password != $confirm_password)){ $confirm_password_err = "No coincide la contraseña.";

        }

    }

    

    // Verifique los errores de entrada antes de insertar en la base de datos

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){  
  
        

        // Prepare una declaración de inserción

              
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
          
        if($stmt = mysqli_prepare($link, $sql)){
            
            
             
            //Vincular variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            // Establecer parámetros
            $param_username = $username;
            $param_password = $password ;  // Creamos un hash de password
                
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
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
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-minimal" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1"><span></span></button>
                            <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="index.html"><img src="images/logo-default.png" alt="" width="176" height="28" srcset="images/logo-default-352x56.png 2x" /></a>
                        </div>
                        <div class="rd-navbar-main-element">
                            <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
                                <!-- RD Navbar Nav-->
                                  <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index1.html">Inicio</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="imagenes.php">Mis imágenes</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="sobremi.html">Sobre mí</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="contacto.html">Contacto</a>
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
			
	<h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form>
    </div>    
		</div>
		
	</div>
			
	</div>
				 
                        </div></div></div></section>      
            
   
    <div class="container">
        <div class="footer-standard-aside">
            <!-- Rights-->
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>“Una fotografía es un secreto sobre un secreto, cuanto más te cuenta menos sabes.” Diane Arbus</span><span>&nbsp;</span>&nbsp;<br class="d-sm-none" />Un diseño&nbsp;de&nbsp;<a href="https://www.templatemonster.com/">Elena Ordiales</a></p>
        </div>
    </div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>