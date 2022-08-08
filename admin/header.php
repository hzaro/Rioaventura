<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <link rel="shortcut icon" href="../images/favicon.png" />
        <title>BIKINI TOURS</title>     
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        <link href="assets/css/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css"/>
            
        <link href="assets/plugins/simditor/styles/simditor.css" rel="stylesheet"/> 
        <!-- Theme Styles -->
        <link href="assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
        <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">

                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                       
                        <div class="header-title col s3 m3">                            
                            <span class="chapter-title">Administrador</span>
                        </div>
                       
                        
                      
                    </div>
                </nav>
            </header>
      
           
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile" style="text-align: center;">
                        <div class="sidebar-profile-image">
                            <img src="../images/logo6.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">                            
                            <p>Bikini Tours</p>
                            <span>reservas@bikinitours.com</span>                           
                        </div>
                    </div>
                  
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <?php 
                        if(isset($_SESSION['admin'])){
                    ?>
                    
                    <!-- <li class="no-padding active"><a class="waves-effect waves-grey active titulos-secciones" href="ver_paquetes.php">Admin</a></li> -->
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Paquetes<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="ver_paquetes.php">Ver Paquetes</a></li>
                                <!-- <li><a href="agregar_paquete.php">Agregar Paquete</a></li> -->
                                <li><a href="agregar_recorrido_especial.php">Agregar Recorrido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Usuarios<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="ver_usuarios.php">Ver Usuarios</a></li>
                                <li><a href="agregar_usuario.php">Agregar Usuario</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey" href="apagar_panel.php"><i class="material-icons">apps</i>Apagar Panel</a>
                    </li>
                    
                    <?php     
                        }
                    ?>


                    <!-- <li class="no-padding active"><a class="waves-effect waves-grey active titulos-secciones" href="comprar_paquetes.php">Usuario: </a></li> -->
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey" href="comprar_paquetes.php"><i class="material-icons">apps</i>Comprar Paquetes</a>
                    </li>

                    <li class="no-padding active"><a class="waves-effect waves-grey active" href="php/login/logout.php"><i class="material-icons">settings_input_svideo</i>Cerrar sesión</a></li>
                </ul>

                <div class="footer" style="text-align: center;">
                    <a href="http://www.ipage.com.ar" target="_blank">
                        <img src="../img/ipage2.png" alt="" / style="width: 70%">
                    </a>
                    <!-- <p class="copyright">LOGO DE IPAGE</p> -->
                </div>
                </div>
            </aside>
