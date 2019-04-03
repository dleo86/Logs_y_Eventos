

<!doctype html>
<html class="fixed">
    <head>
        <!-- Basic -->
        <meta charset="UTF-8">

        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="assets/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
        
       <?php
         session_start();
         require_once 'funciones/funciones_conexion.inc.php';
         require_once 'funciones/validar.inc.php';
         if (!empty($_POST['btnLogin'])) {
              
              $_SESSION['Mensaje'] = ControlesValidos();
              $_SESSION['Mensaje'].= DatosUsuarioCorrecto($_POST['Email']);
              //si la funcion devuelve los mensajes, los mostrare mas abajo
              //si la funcion devuelve un mensaje vacio, entonces ya puedo loguear
              if (!empty($_SESSION['Mensaje'])) {
                  $_SESSION['Mensaje'].= Insertar_logs3($_POST['Email']);
                  $_SESSION['Login']=$_POST['Email'];
                  $_SESSION['Nivel']= ControlarNivel($_POST['Email']);
                  header('Location: index.php');
                  exit;
              }
              else{
                  $_SESSION['Mensaje'].= ErrorLogs($_POST['Email']);
                  $_SESSION['Mensaje'] = "Usuario incorecto";
                  header('Location: login.php');
                  exit;
              }
       }
       ?>
    </head>
    <body>
        <!-- start: page -->
         <?php
            if (!empty($_SESSION['Mensaje'])) {
               // echo $_SESSION['Mensaje'];
            }
            ?>
        <section class="body-sign">
            <div class="center-sign">
                <a href="#" class="logo pull-left">
					<img src="assets/images/final1.png" style='height:70px' alt="Examen Final" />
				</a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2>
                    </div>
                    <div class="panel-body">
                      <?php
                        if (!empty($_SESSION['Mensaje'])) {
                          ?>
                         <div class="alert alert-warning">
                            <p class="m-none text-semibold h6">
                                Los datos son incorrectos
                            </p>
                        </div>
                        <?php
                          }
                       ?>

                        <form method="post">
                        <div class="form-group mb-lg">
                            <label>Username</label>
                            <div class="input-group input-group-icon">
 <input  class="form-control input-lg" type="text" name="Email" value="<?php echo!empty($_POST['Email']) ? $_POST['Email'] : ''; ?>" />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">Password</label>
                                <a href="activar_cuenta.php" class="pull-right">Activar cuenta</a>
                            </div>
                            <div class="input-group input-group-icon">
                                <input  class="form-control input-lg" type = password name="Clave" value="" />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-4 text-right">
                                <button type="submit" name="btnLogin" value="btnLogin" class="btn btn-primary hidden-xs">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="assets/javascripts/theme.js"></script>

        <!-- Theme Custom -->
        <script src="assets/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="assets/javascripts/theme.init.js"></script>

    </body>
</html>
<?php 
//destruyo aqui directamente toda variable de sesion mientras no se encuentre logueado
session_destroy();
$_SESSION = array(); ?>