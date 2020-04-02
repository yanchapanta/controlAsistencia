<style type="text/css">
    .oka_estudiante{
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

    <!-- student content-->
    <div class="row justify-content-center">
        <div class="col-9">
          <h1 class="alert alert-info text-center">Llenar los Datos del formulario </h1>
        </div>
                           
    </div>
    <script>
        function soloLetras(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = "8-37-39-46";

        tecla_especial = false
        for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }

        function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
        return true;
        }
        return false;        
            }
    </script>

    <div class="row justify-content-center">
        <div class="col-4 bg-dark">
        <!--form to fill table-->
            <form class="bg-dark text-light" method="POST" action="nuevoAlumno.php" >

                <div class="form-group">
                <label for="asg">Asignatura</label>
                <input type="text" name="asg" class="form-control" id="asg">
                </div>

                <div class="form-group">
                <label for="ci">C.I</label>
                <input type="text" onkeypress='return validaNumericos(event)' maxlength="10" name="ci" class="form-control" id="ci">
                </div>

                <div class="form-group">
                    <label for="nom">Nombre </label>
                    <input type="text" onkeypress="return soloLetras(event)" name="nom" class="form-control" id="nom" >
                </div>

                <div class="form-group">
                    <label for="dir">Apellido </label>
                    <input type="text" onkeypress="return soloLetras(event)"name="dir" class="form-control" id="dir">
                </div>

            

                <div class="form-group" width="50%" >
                    <label for="tel">Asistencia </label>
                                <div class="form-group" id="nn" >
                                    
                                    <select class="form-control"style="height:35px; width:100%;"name="tel"  id="tel" required value="<?php echo $dir;?>"> >
                                    <option >si</option>
                                    <option>no</option>
                                    </select>
                                </div>
                </div>

                <center>  
                <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
                <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">    
                <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
                <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
                </center>

            </form>
        </div>
		<br>
        <div class="col-4 border border-dark">
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
                    
                        //Lista de Tablas
                        $tabla_db1 =$_POST['asg']; 	   // User tables
                        
                    
                        //error_reporting(0); //Doesn't show me errors
                        
                        $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);
                    
                    
                        if ($conexion->connect_errno) {
                            echo "Nuestro sitio experimenta fallos....";
                            exit();
                        }
                    
                    $doc    ="";
                    $nombre ="";
                    $dir    ="";
                    $tel    ="";

                        
                        
                    if(isset($_POST['btn_consultar']))
                    {
                        
                        $doc=$_POST['ci'];
                        $existe=0;
                        if($doc==""){
                            echo"Este campo es obligatorio";
                            }else{
                                //consulta
                                $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE ci LIKE '%$doc%'");
                                while($consulta = mysqli_fetch_array($resultados))
                                {
                                    echo $consulta['ci']."<BR>";
                                    echo $consulta['nombre']."<BR>";
                                    echo $consulta['apellido']."<BR>";
                                    echo $consulta['asistencia']."<BR>";
                                    $existe++;
                                }
                                if($existe==0){
                                    echo "El documento no existe";
                                    }
                                }
                    }		
                    if(isset($_POST['btn_registrar']))
                    {      
                        $doc=$_POST['ci'];
                        $nom=$_POST['nom'];
                        $dir=$_POST['dir'];
                        $tel=$_POST['tel'];
                        if($doc=="" || $nom==""){
                            echo "Este campo es obligatorio";
                            }else{
                                //insertar
                                mysqli_query($conexion, "INSERT INTO $tabla_db1 
                                (ci,nombre,apellido,asistencia) 
                                values 
                                ('$doc','$nom','$dir','$tel')");				
                                }
                        
                    }  

                    if(isset($_POST['btn_actualizar']))
                    {
                        $doc=$_POST['ci'];
                        $nom=$_POST['nom'];
                        $dir=$_POST['dir'];
                        $tel=$_POST['tel']; 
                        if($doc=="" || $nom==""){
                            echo"Este campo es obligatorio";
                            }else{
                                //consulta
                                $existe=0;
                                    $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE ci LIKE '%$doc%'");
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
                                            $_UPDATE_SQL="UPDATE $tabla_db1 Set 
                                            ci='$doc', 
                                            nombre='$nom',
                                            apellido='$dir',
                                            asistencia='$tel'
                                            
                                            WHERE ci='$doc'"; 
                                            
                                            mysqli_query($conexion,$_UPDATE_SQL); 
                                            echo"Actualización con exito!";
                                        }
                                
                                }    
                        
                        
                    }

                    if(isset($_POST['btn_eliminar']))
                    {
                        error_reporting(0);
                        $doc=$_POST['ci'];
                        if($doc==""){
                            echo"Este campo es obligatorio";
                            }else{
                                //consulta
                                $existe=0;
                                $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE ci LIKE '%$id%'");
                                while($consulta = mysqli_fetch_array($resultados))
                                {//no necesito que me muestre nda
                                    $existe++;
                                }
                                if($existe==0){
                                    echo "El documento no existe";
                                    }else{

                                        $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE ci = '$doc'";
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
    </div>
    









<?php
    include_once('php/footer.php');
?>