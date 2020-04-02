<style type="text/css">
    .oka_usuario{
        background: #cbccce;
    }
    .okatext{
        color: #007bff;
    }
    .okatext:hover{
        color: white;
    }
    .okatext:hover{
        color: #4a7bff7a;
    }
    .okatext:hover:active{
        color: white;
    }
 </style>
<?php 
    include_once('header.php');
?>
<div class="row">
    <div class="col text-center">
    <p style="font-size:40px;font-family: 'Times New Roman', Times, serif"> <b>Información de Usuario</b>
    </p>
    </div>
    
</div>
<div class="row">
        <div class="col">
        <a href="usuarios.php" class="btn btn-outline-warning text-light float-right bg-dark"><i class="fa fa-check">
                    </i> Regresar
                </a>
        </div>
        
    </div>
    <br>

<!--- table User list --->
<!--- Registration form --->
<div class="row justify-content-between m-3 ">    
    <br>

         <div class="col col-md-5 border border-dark">
		<br>
            <h2 class="alert alert-warning text-center" >Resultado de la Configuración</h2>
            <hr>
        <span class="">
             <!--configuration code-->
                <?php
                        error_reporting(0);
                        include_once("php/acessos_datos_conexion.php");
                        $host =$db_host;    // will be the value of our BD
                        $basededatos =$db_nombre;    // will be the value of our BD
                        $usuariodb =$db_usuario;    // will be the value of our BD
                        $clavedb =$db_contra;    // will be the value of our BD
                    
                        
                        $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);
                    
                    
                        if ($conexion->connect_errno) {
                            echo "Nuestro sitio experimenta fallos....";
                            exit();
                        }
                    
                    $usu    ="";
                    $nombre ="";
                    $dir    ="";
                    $tel    ="";

                        
                        
                    if(isset($_POST['btn_buscar']))
                    {
                        
                        $usu=$_POST['usu'];
                        $existe=0;
                        if($usu==""){
                            echo"Este campo es obligatorio";
                            }else{
                                //query
                                $resultados = mysqli_query($conexion,"SELECT * FROM login WHERE username LIKE '%$usu%'");
                                while($consulta = mysqli_fetch_array($resultados))
                                {
                                    echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Id :</b> ".$consulta['id']."<BR>";
                                    echo "<b> &nbsp&nbsp&nbspUsuario : </b>".$consulta['username']."<BR>";
                                    echo "<b>Password :</b> ".$consulta['password']."<BR>";
                                    echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNivel : </b>".$consulta['nivel']."<BR>";
                                    $existe++;
                                }
                                if($existe==0){
                                    echo "El documento no existe";
                                    }
                                }
                    }		
                    if(isset($_POST['btn_registrar']))
                    {      
                        $usu=$_POST['usu'];
                        $con=$_POST['con'];
                        $per=$_POST['perfil'];
                        if($usu=="" || $con==""){
                            echo "Este campo es obligatorio";
                            }else{
                                //insertar
                                mysqli_query($conexion, "INSERT INTO login 
                                (id,username,password,nivel) 
                                values 
                                ('','$usu','$con','$per')");
                               // print "<script>alert(\"Acceso validos.\");window.location='formulario_registro_usuario.php';</script>";
                                echo "Datos ingresados correctamente !";
                                }
                        
                    }  

                    if(isset($_POST['btn_actualizar']))
                    {
                        $usu=$_POST['usu'];
                        $con=$_POST['con'];
                        $per=$_POST['perfil']; 
                        if($usu=="" || $con==""){
                            echo"Este campo es obligatorio";
                            }else{
                                //consulta
                                $existe=0;
                                    $resultados = mysqli_query($conexion,"SELECT * FROM login WHERE username LIKE '%$usu%'");
                                while($consulta = mysqli_fetch_array($resultados))
                                {
                                    /*echo $consulta['doc']."<BR>";
                                    echo $consulta['nombre']."<BR>";
                                    echo $consulta['apellido']."<BR>";
                                    echo $consulta['asistencia']."<BR>";*/
                                    $existe++;
                                }
                                if($existe==0){
                                    echo "El documento no existe";
                                    }else{
                                            //ACTUALIZAR 
                                            $_UPDATE_SQL="UPDATE login Set 
                                            
                                            username='$usu', 
                                            password='$con',
                                            nivel='$per'
                                            
                                            WHERE username='$usu'"; 
                                            
                                            mysqli_query($conexion,$_UPDATE_SQL); 
                                            echo"Actualización con exito!";
                                        }
                                
                                }    
                        
                        
                    }

                    if(isset($_POST['btn_eliminar']))
                    {
                        error_reporting(0);
                        $usu=$_POST['usu'];
                        if($usu==""){
                            echo"Este campo es obligatorio";
                            }else{
                                //consulta
                                $existe=0;
                                $resultados = mysqli_query($conexion,"SELECT * FROM login WHERE username LIKE '%$id%'");
                                while($consulta = mysqli_fetch_array($resultados))
                                {//no necesito que me muestre nda
                                    $existe++;
                                }
                                if($existe==0){
                                    echo "El documento no existe";
                                    }else{

                                        $_DELETE_SQL =  "DELETE FROM login WHERE username = '$usu'";
                                            mysqli_query($conexion,$_DELETE_SQL);
                                            echo"Se ha eliminado con exito!";
                                            }			
                                            
                                }
                    }

                    mysqli_close($conexion);
                ?>
        </span>  
             <hr>                 
           

    </div>            
        <div class="col col-md-7 bg-dark  p-5">
            <form  action="formulario_registro_usuario.php" method="post">
                <div class="form-group">
                    <label class="text-light"  for="exampleInputEmail1">Usuario</label>
                    <input type="user" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario" name="usu">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label class="text-light"for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="con">
                </div>
                <div class="form-group">
                    <label class="text-light" for="exampleFormControlSelect1">Nivel de Acceso</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="perfil">
                    <option>Administrador</option>
                    <option>usuario</option>
                    </select>
                </div>
                <input type="submit" value="Buscar" class="btn btn-warning" name="btn_buscar">    
                <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">    
                <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
                <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
                <br>
                <br>
            </form>
        </div>
       


    
        
    </div>    

 


<?php
    include_once('php/footer.php');