<!doctype html>
<html class="fixed">
    <head>
        <?php 
        session_start();
        require_once 'funciones/listado_logs.php';
        require_once 'funciones/funciones_conexion.inc.php';
          //comienzo a usar sesiones
        //si la session que contiene el valor del login esta vacia, 
       //o algun valor identificando una sesion abierta este vacio...
      if (empty($_SESSION['Login'])) { 
       //automaticamente redireccionar al login.php
        header('Location: login.php');
        exit;
      }
//si la sesion contiene valor, es porque se logueo y puedo mostrar el contenido
 ?>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Mis Datos </title>
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

       

    </head>
    <body>
        <section class="body">

            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="../" class="logo">
                        <img src="assets/images/final.png" style='height:70px' alt="Examen Final" />
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">

                    <form action="pages-search-results.html" class="search nav-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <span class="separator"></span>
                    <span class="separator"></span>

                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                                <span class="name"><?php echo $_SESSION['Login']; ?></span>
                                <span class="role"><?php if ($_SESSION['Login'] == "Administrador") echo "administrator"; 
                                                          else echo "usuario";?></span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="miperfil.php"><i class="fa fa-user"></i> Mi perfil</a>
                                </li>

                                <li>
                                    <a role="menuitem" tabindex="-1" href="cerrar.php"><i class="fa fa-power-off"></i> Salir</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>

                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">
                                    <li>
                                        <a href="index.html">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body has-toolbar">
                    <header class="page-header">
                        <h2>Modificar mis datos</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Usuario</span></li>
                                <li><span>Mis Datos</span></li>
                            </ol>

                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="inner-toolbar clearfix">

                    </div>

                   
  <form>
							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Nombre</label>
										<input class="form-control input-lg">
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Apellido</label>
										<input class="form-control input-lg">
									</div>
								</div>
							</div>
							

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Cambia tu clave</label>
										<input class="form-control input-lg">
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Confirma tu nueva clave</label>
										<input class="form-control input-lg">
									</div>
								</div>
							</div>
							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Subi tu avatar</label>
										<input class="form-control input-lg" type='file'>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary hidden-xs">Guardar</button>
								</div>
							</div>

							</form>

                    <!-- end: page -->
                </section>
            </div>


        </section>

        <!-- Vendor -->
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>

               <!-- Theme Custom -->
        <script src="assets/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="assets/javascripts/theme.init.js"></script>

    </body>
</html>