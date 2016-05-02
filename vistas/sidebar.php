<!DOCTYPE html>
<html>
<head>
    <title>:0.0:</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap -->	<!--modifica header, input, letra, etc-->
    <link href="../vistas/css/bootstrap/bootstrap.css" rel="stylesheet" />	<!--menu cerrar sesion-->
    <link href="../vistas/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />	

    <!-- libraries -->	<!--modifica icons-->

    <link href="../vistas/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="../vistas/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />   <!--metaforas-->
    <link href="../vistas/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="../vistas/css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="../vistas/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />


<!--global styles--> 	<!--modifica el estilo del aside-->
    <link rel="stylesheet" type="text/css" href="../vistas/css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="../vistas/css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="../vistas/css/compiled/icons.css" />
    <link rel="stylesheet" type="text/css" href="../vistas/css/compiled/pass.css" />

<!--this page specific styles -->
    <link rel="stylesheet" href="../vistas/css/compiled/index.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../vistas/css/compiled/form-showcase.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../vistas/css/datatable/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="../vistas/css/app.css" />

</head>
<body>
    <!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">            
            <a class="navbar-brand" href="principal.php">
                <img src="css/images/logo.gif" alt=""  width="35"/>  SISTRAERCA
            </a>
        </div>

        <ul class="nav navbar-nav pull-right hidden-xs">                       
            <li class="notification-dropdown hidden-xs hidden-sm">   <!-- muestra el icono user-->
                <a href="#" class="trigger">
                    <i class="icon-user"></i>
                </a>
                <div class="pop-dialog">                    
                </div>
            </li>
            <li class="dropdown open">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    Usuario <?php echo ": ".$_SESSION['usuario'] ?>
                </a>                
            </li>             
            <li class="settings-hidden-xs hidden-sm">
                <a href="../control/cerrarSesion.php" role="button" onclick="if(confirm('&iquest;Esta seguro que desea cerrar la sesi&oacute;n?')) return true;  else return false;" >
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </header>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
     <script type="text/javascript">
            // $(document).ready(function() {
            //     // Create a jqxMenu
            //     //$("#jqxMenu").jqxMenu({ width: '200', mode: 'vertical'});
            // });
        </script> 
         
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>  <!--layout.css-->
                    <!-- <div class="arrow_border"></div>  --> <!--layout.css-->
                </div>
                <a href="principal.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li> 
<!--inicio pacientes--> 
             <li>
                <a class="dropdown-toggle" href="#"><!--separacion-->
                    <i class="icon-ambulance"></i><!--icon-->
                    <span>Pacientes</span>
                    <i class="icon-chevron-down"></i><!--flecha-->
                </a> <!--fin class ="dropdown-toggle"-->
                <ul class="submenu">
                    <li><a href="pacientes_shows.php">Listado</a></li>
                    <li><a href="pacientes.php">Registrar</a></li>
                    
                    <!-- <li><a href="b_paciente.php">Consultar</a></li>
                    <li><a href="edit_paciente.php">Modificar</a></li> -->
                    <li><a href="hist.php">Historial Cinico</a></li>
                </ul>
            </li>            
<!--inicio citas-->            
            <li>
                <a class="dropdown-toggle" href="#"><!--separacion-->
                    <i class="icon-group"></i>
                    <span>Citas</span>
                    <i class="icon-chevron-down"></i><!--flecha-->
                </a> <!--fin class ="dropdown-toggle"-->
                <ul class="submenu">
                    <li><a  href="listas_citas.php">Listado </a></li>
					<!-- <li><a href="citas.php">Registrar</a></li> -->
                    <!-- <li><a href="b_citas.php">consultar</a></li> -->
                    

                </ul>
            </li> 
<!--fin citas-->
            
             <li>
                <a class="dropdown-toggle" href="#"><!--separacion-->
                    <i class="icon-user-md"></i><!--icon-->
                    <span>Medicos</span>
                    <i class="icon-chevron-down"></i><!--flecha-->
                </a> <!--fin class ="dropdown-toggle"-->
                <ul class="submenu">
                    <li><a href="index_medicos.php">Lisdato</a></li>
                    <li><a href="medicos.php" >Registrar</a></li>
                    <!-- <li><a href="edit_medico.php">Modificar</a></li> -->
                </ul>
			</li> 


            <li>
                <a class="dropdown-toggle" href="#"><!--separacion-->
                    <i class="icon-th-list"></i><!--icon-->
                    <span>Reportes</span>
                    <i class="icon-chevron-down"></i><!--flecha-->
                </a> <!--fin class ="dropdown-toggle"-->
                <ul class="submenu">
                    <li><a href="reportes.php" >Estadisticos</a></li>
                    <li><a href="reporte_asistencia_mes.php" >Asistencia al mes</a></li>
                </ul>
            </li> 
            <!--reporte-->

<?php 
    if ($_SESSION['tipo'] == 1) {
?>

            <!-- usuario -->
            <li>
                <a class="dropdown-toggle" href="#"><!--separacion-->
                    <i class="icon-user"></i><!--icon-->
                    <span>Usuario</span>
                    <i class="icon-chevron-down"></i><!--flecha-->
                </a> <!--fin class ="dropdown-toggle"-->
                <ul class="submenu">
                    <li><a href="usuarios_show.php" >Listado</a></li>
                    <li><a href="user_create.php" >Registrar</a></li>
                </ul>
            </li> 

            <!-- configuracion -->
            <li>
                <a class="dropdown-toggle" href="#"><!--separacion-->
                    <i class="icon-cog"></i><!--icon-->
                    <span>Configuración</span>
                    <i class="icon-chevron-down"></i><!--flecha-->
                </a> <!--fin class ="dropdown-toggle"-->
                <ul class="submenu">
                    <li><a href="config_citas.php" >Citas</a></li>
                </ul>
            </li> 
<?php
    }
?>
            <!-- fin usuario -->
              <li>
                <a class="dropdown-toggle" href="#"><!--separacion-->
                    <i class="icon-book"></i><!--icon-->
                    <span>Ayuda</span>
                    <i class="icon-chevron-down"></i><!--flecha-->
                </a> <!--fin class ="dropdown-toggle"-->
                <ul class="submenu">
                    <li><a href="https://twitter.com" target="_blank">Ayuda</a></li>


                </ul>
            </li> 
           <!--ayuda--> 
           
        </ul> <!--fin ul id="dashboard-menu"-->
    </div> <!--fin id="sidebar-nav"-->
    <!-- end sidebar -->
    
