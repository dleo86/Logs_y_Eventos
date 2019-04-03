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
      if (empty($_SESSION['Login']) || empty($_SESSION['Nivel'])) { 
       //automaticamente redireccionar al login.php
        header('Location: login.php');
        exit;
      }
//si la sesion contiene valor, es porque se logueo y puedo mostrar el contenido
 ?>

        <!-- Basic -->
       
        <meta charset="UTF-8">

        <title>Log Viewer </title>
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
                                                                      
                                <span class="role"><?php if ($_SESSION['Nivel'] == 2) echo "administrator"; 
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
                        <h2>Visor de Logs</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Pages</span></li>
                                <li><span>System Log</span></li>
                            </ol>

                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="inner-toolbar clearfix">

                    </div>

                    <section class="panel">
                        <div class="panel-body tab-content">
                            <div id="access-log" class="tab-pane active">
                                <table class="table table-striped table-no-more table-bordered  mb-none">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"><span class="text-normal text-sm">Tipo de evento</span></th>
                                            <th style="width: 15%"><span class="text-normal text-sm">Fecha y hora</span></th>
                                            <th><span class="text-normal text-sm">Mensaje</span></th>
                                            <th><span class="text-normal text-sm">Usuario</span></th>
                                        </tr>
                                    </thead>
                                    <tbody class="log-viewer">
                                     <?php
                                       $ListadoLogs = Listar_logs();
                                       if (!empty($ListadoLogs)) {
                                          $cantLogs = count($ListadoLogs);
                                          for ($i=0; $i < $cantLogs; $i++) { 
                                           
                                      
                                      ?>

                                        <tr>
                                            <td data-title="Type" class="pt-md pb-md">
                                                <i class="fa fa-info fa-fw text-info text-md va-middle"></i>
                                                <?php echo $ListadoLogs[$i]['tipoEvento']; ?>
                                            </td>
                                            <td data-title="Date" class="pt-md pb-md">
                                                <?php echo $ListadoLogs[$i]['fechaLog']; ?>
                                            </td>
                                            <td data-title="Message" class="pt-md pb-md">
                                                <?php echo $ListadoLogs[$i]['descripEvento'];
                                                 /*if ($ListadoLogs[$i]['eventoLog'] == 1){
                                                          echo "Activacion de cuenta";
                                                      }
                                                          elseif ($ListadoLogs[$i]['eventoLog'] == 2) {
                                                              echo "Email inexistente para activar";
                                                          } elseif ($ListadoLogs[$i]['eventoLog'] == 3) {
                                                              echo "Acceso correcto";    
                                                               } else echo "Datos incorrectos en login";*/
                                                           
                                                 ?>
                                            </td>
                                            <td data-title="User" class="pt-md pb-md">
                                                <?php echo $ListadoLogs[$i]['emailLog']; ?>
                                            </td>
                                        </tr>
                                    <?php }
                                    } ?>
                                       

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </section>
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