<?php
 session_start();
include_once('php/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!--browser compatibility-->
    <meta http-equiv="x-ua-compatible" content="ie-edge">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- OTHER ADDITIONAL DATE ICON CODES-->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src="js/jquery-1.10.2.js"></script>
        <link href='res/fullcalendar.min.css' rel='stylesheet' />
        <link href='res/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='res/js/moment.min.js'></script>
        <script src='res/fullcalendar.min.js'></script>

        
       
    <!------------------------------------------------------------------------------>
    <title>Sistema de Asistencia</title>
      <!-- Description tittle -->
      <meta neme="description" content="Sistema de Asistencia">
      <!-- Page icon --> 
      <link rel="shortcut icon" href="imagen/iconos/logo.jpg" type="image/x-icon">

       <script>
            function nav(value) {
                if (value != "") { location.href = value; }else{
                    location: asistencias.php;
                }
            }
        </script>
        <style type="text/css">
            body{
                background: #ffc10705;
            }
            .fondo{
                background: #a8dec033;
                box-shadow: 10px 10px 10px 10px #888888;
            }
            footer{                
                margin-top: 50px;
            }
            
        </style>
  </head>
  <body> 
  <div class="container fondo">
    <!-- menu -->
    <div class="row">
        <div class="col-3 col-sm-4 col-md-5 col-lg-12 col-xl-12">
           <nav class="navbar navbar-expand navbar-dark fixed-top" style="background-color: khaki;">
                <a href="#" class="navbar-brand"><img src="imagen/iconos/logoo.png" style="width: 45px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#idUnoMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>        	
                <div class="collapse navbar-collapse" id="idUnoMenu">
                    <ul class="navbar-nav" style="font-size:20px;">	          	          	
                        <li class="nav-item oka"><a href="inicio.php" class="nav-active okatext" style="text-decoration: none; padding: 10px;" >Inicio</a></li>
                        <li class="nav-item oka_asistencia"><a href="asistencias.php" class="nav-active okatext" style="text-decoration: none;  padding: 10px;">Asistencia</a></li>
                        <li class="nav-item oka_usuario"><a href="usuarios.php" class="nav-active okatext" style="text-decoration: none;  padding: 10px;">Usuario</a></li>
                        <li class="nav-item oka_estudiante"><a href="estudiantes.php" class="nav-active okatext" style="text-decoration: none;  padding: 10px;">Estudiante</a></li>
                        <li class="nav-item oka_asignatura"><a href="asignaturas.php" class="nav-active okatext" style="text-decoration: none;  padding: 10px;">Asignatura</a></li> 
                            
                    </ul>
                </div>
                <form action="#" method="post" class="form-inline ">
                    <a href="logout.php" class="btn btn-secondary btn-SM" role="button" aria-pressed="true">Salir</a>                    
                </form>         
            </nav>  
        </div>
    </div>
        <br>
        <br>
        <br>
	<div class="row">
     <div class="col d-block d-sm-block d-md-none">
        <form action="#" method="post" class="form-inline ">
            <a href="logout.php" class="btn btn-secondary btn-SM" role="button" aria-pressed="true">Salir</a>
            
        </form> 
     </div>   
    </div>
    
    <!-- ACCESS DATA -->
    <div class="row">
        <div class="col">
            <!----Customer data and access level-->
                <b class="text-end text-primary" id="welcome">
                Bienvenido : 
                    <i>
                    <?php
                    echo $_SESSION['usuario'];
                    echo "<br>";
                    echo "Nivel: ".$_SESSION['dueno'];
                    
                    ?> 

                    </i>
                </b>
        </div>        
    </div>
    <!-- current date -->
    <div class="row justify-content-center">
        <div class="col-10 col-md-6"> 
            <p class="border border-dark text-center bg-warning"  style="font-size:20px;" >  
                <script>
                    $(function () {
                        $.datepicker.setDefaults($.datepicker.regional["es"]);
                        $("#datepicker").datepicker({
                            dateFormat: 'dd/mm/yy',
                            firstDay: 1
                        }).datepicker("setDate", new Date());
                    });
                </script> 

                <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet"/>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>

                <!--DATES-->
                    <label for="datepicker"> Quito, </label>
                    <a> 
                        <script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            var f=new Date();
                             document.write(f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
                            
                        </script>                   
                        
                    </a>                
            </p>    


        </div>
    </div>


