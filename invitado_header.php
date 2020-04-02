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
      <!-- Describe the title -->
      <meta neme="description" content="Sistema de Asistencia">
      <!-- Page icon --> 
      <link rel="shortcut icon" href="imagen/iconos/logoo.png" type="image/x-icon">

       <script>
            function nav(value) {
            if (value != "") { location.href = value; }else{
                location: asistencia.php;
            }
            }
        </script>
  </head>
  <body> 
  <div class="container bg-light ">
    <!-- menu -->
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: khaki;">
                <a href="#" class="navbar-brand"><img src="imagen/iconos/logoo.png" style="width: 45px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#idUnoMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>        	
                <div class="collapse navbar-collapse" id="idUnoMenu">
                    <ul class="navbar-nav" style="font-size:20px;">	          	          	
                        <li class="nav-item"><a href="invitado_inicio.php"  class="nav-active" style="text-decoration: none; padding: 10px;">Inicio</a></li>
                        <li class="nav-item"><a href="invitado_asistencias.php"  class="nav-active" style="text-decoration: none; padding: 10px;">Asistencia</a></li>
                        <!--<li class="nav-item"><a href="estudiantes.php" class="nav-link">Estudiante</a></li>-->
                        <!--<li class="nav-item"><a href="asignaturas.php" class="nav-link">Asignatura</a></li> -->
                            
                    </ul>
                </div>
                <form action="#" method="post" class="form-inline">
                    <a href="logout.php" class="btn btn-secondary btn-SM" role="button" aria-pressed="false">Salir</a>
                    </p>
                </form>         
            </nav>  
        </div>
    </div>
        <br>
        <br>
        <br>		
	
    <!-- ACCESS DATAS -->
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
    <!-- fecha actual -->
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

                <!--fechas-->
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

