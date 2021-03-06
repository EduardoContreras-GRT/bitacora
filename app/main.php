<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Bit&aacute;cora Digital | GrahamRossTraining - SalesTech</title>
        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="keywords" content="" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);
            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- //Meta Tags -->
        <!-- Style-sheets -->
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap Css -->
        <!-- Bars Css -->
        <link rel="stylesheet" href="assets/css/bar.css">
        <!--// Bars Css -->
        <!-- Calender Css -->
        <link rel="stylesheet" type="text/css" href="assets/css/pignose.calender.css" />
        <!--// Calender Css -->
        <!-- Common Css -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--// Common Css -->
        <!-- Nav Css -->
        <link rel="stylesheet" href="assets/css/style4.css">
        <!--// Nav Css -->
        <!-- Fontawesome Css -->
        <link href="assets/css/fontawesome-all.css" rel="stylesheet">
        <!--// Fontawesome Css -->
        <!--// Style-sheets -->
        <!--web-fonts-->
        <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!--//web-fonts-->
    </head>
    <body>
        <div class="se-pre-con"></div>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h1>
                        <a href="#" onclick="changePage('dash');">Bit&aacute;cora</a>
                    </h1>
                    <span>Bit</span>
                </div>
                <!--<div class="profile-bg"></div>-->
                <ul class="list-unstyled components">
                    <li id="dash" class="active">
                        <a href="#" onclick="changePage('dash');">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </li>
                    <li id="leads">
                        <a href="#" onclick="changePage('leads');">
                            <i class="fas fa-globe"></i>
                            Leads
                        </a>
                    </li>
                    <li id=citas>
                        <a href="#" onclick="changePage('citas');">
                            <i class="fas fa-calendar"></i>
                            Citas
                        </a>
                    </li>
                    <li id="seguimiento">
                        <a href="#" onclick="changePage('seguimiento');">
                            <i class="fas fa-edit"></i>
                            Seguimiento
                        </a>
                    </li>                   
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-cogs"></i>
                            Configuraci&oacute;n
                            <i class="fas fa-angle-down fa-pull-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li id="agencias">
                                <a href="#" onclick="changePage('agencias','cat');">Agencias</a>
                            </li>
                            <li id="asesores">
                                <a href="#" onclick="changePage('asesores','cat');">Asesores</a>
                            </li>
                            <li id="cam-leads">
                                <a href="#" onclick="changePage('CampLead','cat');">Campa&ntilde;as de Lead</a>
                            </li>
                            <li id="eta-citas">
                                <a href="#" onclick="changePage('EtapasCitas','cat');">Etapas de Citas</a>
                            </li>
                            <li id="eta-leads">
                                <a href="#" onclick="changePage('EtapasLead','cat');">Etapas de Lead</a>
                            </li>
                            <li id="eta-seguimientos">
                                <a href="#" onclick="changePage('EtapasSeguimiento','cat');">Etapas de Seguimientos</a>
                            </li>
                            <li id="for-compra">
                                <a href="#" onclick="changePage('FormaCompra','cat');">Forma de Compra</a>
                            </li>
                            <li id="fue-lead">
                                <a href="#" onclick="changePage('FuenteLead','cat');">Fuentes de Lead</a>
                            </li>
                            <li id="guiones">
                                <a href="#" onclick="changePage('Guiones','cat');">Guiones</a>
                            </li>
                            <li id="tip-temperatura">
                                <a href="#" onclick="changePage('Temperaturas','cat');">Temperatura</a>
                            </li>
                            <li id="tip-asesores">
                                <a href="#" onclick="changePage('TiposAsesores','cat');">Tipos de asesores</a>
                            </li>
                            <li id="tip-plantillas-guiones">
                                <a href="#" onclick="changePage('TiposPlantillasGuion','cat');">Tipos de Plantillas Guiones</a>
                            </li>
                            <li id="tip-seguimientos">
                                <a href="#" onclick="changePage('TiposSeguimiento','cat');">Tipos de seguimientos</a>
                            </li>
                            <li id="usuarios">
                                <a href="#" onclick="changePage('usuarios','cat');">Usuarios</a>
                            </li>
                            <li id="veh-modelos">
                                <a href="#" onclick="changePage('veh-modelos','cat');">Veh&iacute;culos - modelos</a>
                            </li>
                            <li id="veh-versiones">
                                <a href="#" onclick="changePage('veh-versiones','cat');">Versiones - veh&iacute;culos</a>
                            </li>
                        </ul>
                    </li>                                        
                </ul>
            </nav>
            <!-- Page Content Holder -->
            <div id="content">
                <!-- top-bar -->
                <nav class="navbar navbar-default mb-xl-5 mb-4">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <!-- Search-from -->
                        <form action="#" method="post" class="form-inline mx-auto search-form">
                            <input class="form-control mr-sm-2" type="search" placeholder="Lead, Cita, Contactos.." aria-label="Search" required="">
                            <button class="btn btn-style my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                        <!--// Search-from -->
                        <ul class="top-icons-agileits-w3layouts float-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="far fa-bell"></i>
                                    <!--<span class="badge">4</span>-->
                                </a>
                                <div class="dropdown-menu top-grid-scroll drop-1">
                                    <h3 class="sub-title-w3-agileits">Notificaciones</h3>
<!--                                    <a href="#" class="dropdown-item mt-3">
                                        <div class="notif-img-agileinfo">
                                            <img src="images/clone.jpg" class="img-fluid" alt="Responsive image">
                                        </div>
                                        <div class="notif-content-wthree">
                                            <p class="paragraph-agileits-w3layouts py-2">
                                                <span class="text-diff">John Doe</span> Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                                            <h6>4 mins ago</h6>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <div class="notif-img-agileinfo">
                                            <img src="images/clone.jpg" class="img-fluid" alt="Responsive image">
                                        </div>
                                        <div class="notif-content-wthree">
                                            <p class="paragraph-agileits-w3layouts py-2">
                                                <span class="text-diff">Diana</span> Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                                            <h6>6 mins ago</h6>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <div class="notif-img-agileinfo">
                                            <img src="images/clone.jpg" class="img-fluid" alt="Responsive image">
                                        </div>
                                        <div class="notif-content-wthree">
                                            <p class="paragraph-agileits-w3layouts py-2">
                                                <span class="text-diff">Steffie</span> Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                                            <h6>12 mins ago</h6>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <div class="notif-img-agileinfo">
                                            <img src="images/clone.jpg" class="img-fluid" alt="Responsive image">
                                        </div>
                                        <div class="notif-content-wthree">
                                            <p class="paragraph-agileits-w3layouts py-2">
                                                <span class="text-diff">Jack</span> Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                                            <h6>1 days ago</h6>
                                        </div>
                                    </a>-->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Ver todo</a>
                                </div>
                            </li>
<!--                            <li class="nav-item dropdown mx-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-spinner"></i>
                                </a>
                                <div class="dropdown-menu top-grid-scroll drop-2">
                                    <h3 class="sub-title-w3-agileits">Shortcuts</h3>
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="fas fa-chart-pie mr-3"></i>Sed feugiat</h4>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="fab fa-connectdevelop mr-3"></i>Aliquam sed</h4>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="fas fa-tasks mr-3"></i>Lorem ipsum</h4>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="fab fa-superpowers mr-3"></i>Cras rutrum</h4>
                                    </a>
                                </div>
                            </li>-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="far fa-user"></i>
                                </a>
                                <div class="dropdown-menu drop-3">
                                    <div class="profile d-flex mr-o">
<!--                                        <div class="profile-l align-self-center">
                                            <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                                        </div>-->
                                        <div class="profile-r align-self-center">
                                            <h3 class="sub-title-w3-agileits">Nombre</h3>
                                            <a href="mailto:info@example.com">correo@example.com</a>
                                        </div>
                                    </div>
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="far fa-user mr-3"></i>My Profile</h4>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="fas fa-link mr-3"></i>Activity</h4>
                                    </a>
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="far fa-envelope mr-3"></i>Messages</h4>
                                    </a>                                  
                                    <a href="#" class="dropdown-item mt-3">
                                        <h4>
                                            <i class="far fa-thumbs-up mr-3"></i>Support</h4>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="login.html">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--// top-bar -->
                <div id="divContainer" class="container-fluid">
                </div>
              
                <!-- Copyright -->
               <!--  <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                    <p>© 2018  GrahamRoss Training . All Rights Reserved
                    </p>
                </div>-->
                <!--// Copyright -->
            </div>
        </div>
        <!-- Required common Js -->
        <script src='assets/js/jquery-2.2.3.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     
        <!-- //Required common Js -->
        <!-- loading-gif Js -->
        <script src="assets/js/modernizr.js"></script>
        <!--// loading-gif Js -->
        <!-- Graph -->
        <script src="assets/js/SimpleChart.js"></script>
        <!-- Bar-chart -->
        <script src="assets/js/rumcaJS.js"></script>
        <!-- <script src="assets/js/example.js"></script> -->
        <!--// Bar-chart -->
        <!-- Calender -->
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/pignose.calender.js"></script> 
        <!--// Calender -->
        <!-- profile-widget-dropdown js-->
        <script src="assets/js/script.js"></script>
        <!--// profile-widget-dropdown js-->
        <!-- Count-down -->
        <script src="assets/js/simplyCountdown.js"></script>
        <link href="assets/css/simplyCountdown.css" rel='stylesheet' type='text/css' />
        <script src='assets/js/amcharts.js'></script>    
        <!-- Js for bootstrap working-->
        <!-- <script src="assets/js/bootstrap.min.js"></script> -->
        <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->
        
        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="assets/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="assets/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="assets/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="assets/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="assets/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="assets/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="assets/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin   
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
        <!-- Chartist JS -->
        <script src="assets/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

        <script>
            changePage = function (page, tipo = ""){
                console.log(page);
                var url = "forms/";
                $("#divContainer").html();
                $(".active").removeClass("active");
                $("#"+page).addClass("nav-item active");
                
                url += (tipo=="")? page + ".php?" : "cat/" + page + ".php?";
                $("#divContainer").load( url + new Date().getTime(), function() {                   
                });
            };            
            
            
            $(document).ready(function () {
                $(".dropdown").hover(
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                        $(this).toggleClass('open');
                    },
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                        $(this).toggleClass('open');
                    }
                );
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
                $(".se-pre-con").fadeOut("slow");
           
            });
        </script>
    </body>
</html>