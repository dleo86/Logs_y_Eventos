 
       
      
<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

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
        <?php
         session_start();
         require_once 'funciones/validar.inc.php';
         require_once 'funciones/funciones_conexion.inc.php';
         //si pulsa el boton comienzo validando los controles
         if (!empty($_POST['btnEnviar'])) {
            $_SESSION['Mensaje'] = ControlesValidos();
         //si la funcion devuelve los mensajes, los mostrare mas abajo
         //si la funcion devuelve un mensaje vacio, entonces ya puedo registrar
            if(empty($_SESSION['Mensaje'])){
              $_SESSION['Mensaje'].= ControlarUsuarioRepetido($_POST['Email']);
              if (!empty($_SESSION['Mensaje'])) {
                 //if (Insertar() != false) {
                   $_SESSION['Mensaje'].= Activacion($_POST['Email']);
                   $_SESSION['Mensaje'].= Insertar_logs($_POST['Email']);
                   $_SESSION['Mensaje'] = "Activacion correcta";
                   header('Location: index.php');
                   exit;
                 //}
              }
            else{
                $_SESSION['Mensaje'].= Insertar_logs2($_POST['Email']);
                $_SESSION['Mensaje'] = "Activacion nueva";
                header('Location: index.php');
                exit;
            }
          }  
       }
          ?>
    </head>
   
    <body>
        <!-- start: page -->
         <?php
            if (!empty($_SESSION['Mensaje'])) {
                echo $_SESSION['Mensaje'];
            }
            ?>
        <section class="body-sign">
            <div class="center-sign">
                <a href="#" class="logo pull-left">
                    <img src="assets/images/final1.png" style='height:90px' alt="" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Recuperar Contrase&ntilde;a</h2>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info">
                            <p class="m-none text-semibold h6">
                                Ingresa tu mail para activar tu cuenta y poder ingresar al panel.    
                            </p>
                        </div>

                        <div class="alert alert-warning">
                            <p class="m-none text-semibold h6">
                                El email ingresado no existe.
                            </p>
                        </div>

                        <div class="alert alert-success">
                            <p class="m-none text-semibold h6">
                                Listo! Tu cuenta se encuentra activa nuevamente.                                                        </p>
                        </div>
                        <form method="post">
                            <div class="form-group mb-none">
                                <div class="input-group">
                                    <input type="email" name="Email" value="<?php echo!empty($_POST['Email']) ? $_POST['Email'] : ''; ?>" class="form-control input-lg" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-lg" name="btnEnviar" value="enviar" >Activar!</button>
                                    </span>
                                </div>
                            </div>

                            <p class="text-center mt-lg">Has activado tu cuenta? 
                                <a href="login.php">Ya puedes ingresar!</a>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>

    </body>
</html>
<?php session_destroy();
$_SESSION = array(); ?>