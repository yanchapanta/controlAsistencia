
<!doctype html>
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
        <!-- DESCRIBE THE TITLE -->
        <meta name="description" content="Sistema de Asistencia con php, Control asistendia con phpmysql">
        <!-- PAGE ICON --> 
        <link rel="shortcut icon" href="imagen/iconos/logo.jpg" type="image/x-icon">
        <style>
          video {	
                  position: fixed;
                  min-width:100%;
                  min-height: 100%;                
                  z-index:-1;
                }
          
        </style>
  </head>
  <body>  
    <!-- VIDEO OF FONT -->
   <div class="row ">
      <div class="col-1  ">
          <video src="video/go.mp4#t=120" autoplay loop muted></video>
      </div>
    </div>
    <!-- TITLE LOGIN -->
  <div class="container ">
                <div class="row">
                  <div class="col-12 ">
                  <p class="text-center font-italic font-weight-bold " style="color:#007bff; font-size:74px;">Sistema de Control de Asistencia</p>
                  </div>
                </div>
  </div>
  <!-- IMAGE  LOGIN -->
<div class="container ">
                <div class="row justify-content-center ">
                  <div class="col-12 ">
                  <p class="text-center">
                  <img id="" class="img img-fluid" src="imagen/iconos/user.png" style="margin: auto; width: 100px;"/>
                  </p>
                  
                  </div>
                </div>
  </div>
  <!-- FORM  LOGIN -->
  <div class="container   pb-5" >
                <div class="row justify-content-center">
                  <div class="col-10 col-sm-6 col-lg-5 ">
                    <div class="">          
                    <p id="profile-name" class="profile-name-card"></p>
                      <div class="m-80 border p-5 border-primary" style="border-radius: 5px;">
                        <form class="form-signin "action="login.php" method="post" >
                          <span id="reauth-email" class="reauth-email"></span>
                          <label class="text-center font-italic font-weight-bold" style="color: #AF601A;font-size:15px" for="username">Usuario</label>
                          <input id="username" name="username"  type="text" class="form-control border border-danger" placeholder="" required autofocus><br>
                          <label  class="text-center font-italic font-weight-bold" style="color: #AF601A;font-size:15px"  for="password">Contraseña</label>
                          <input id="password" name="password" type="password" class="form-control border border-danger" placeholder="" required><br>
                          <button  name="login" type="submit" value="Login" class="btn btn-primary btn-block btn-signin">Ingresar</button>

                        </form><!-- /form -->
                      </div>
                    </div>
                  </div>
                </div>
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>