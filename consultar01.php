 <style type="text/css">
    .oka_asistencia{
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

                  
    if(error_reporting(0)){
        session_start();
    
    } 
    
    //TABLE ACCESS
    $nombre_tabla= $_SESSION['tabla_seleccion'];
    $nombre_fecha= $_SESSION['tabla_fecha'];

?>


   
   <!-- main title -->
    <div class="row">
        <div class="col text-center">
        <p style="font-size:40px;font-family: 'Times New Roman', Times, serif"> <b><?php echo $nombre_tabla;?></b>
        </p>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8 col-xl-9 d-sm-none">
            <p class="alert alert-primary alert-dismissable">
            <!--
            This function works thanks to the codes:
             & time; call an element "x"
            -->
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Como usar!</strong>, para ver toda la información tiene que deslizar con el dedo, de derecha a izquierda. 
            </p>
        </div>
    </div>



    
    <!-- content of the networks table -->
    
    <div class="row justify-content-center">
        <!--TABLA DE OCNTENIDO DEL USUARIO-->
        <div class="col-md-9 ">
        <?php
        
 
   
       
        
            //--------------------------------pasted page-------------------
            $tamanio_paginas=30;//1
                if(isset($_GET["pagina"])){
                    
                        if($_GET["pagina"]==0){
                            header("Location:consultar01.php");
                        }else{
                            
                        $pagina= $pagina=$_GET["pagina"];
                        }
                    
                    }else{ $pagina=1;}
                    
                
         
                   
                //$pagina=1;//2
                $emprezar_desde=($pagina-1)*$tamanio_paginas;
                
                $sql_total="SELECT*FROM $nombre_tabla";
                $resultado=$base->prepare($sql_total);
                $resultado->execute(array());
                $num_filas=$resultado->rowCount();//3   shows the number of rows
                $total_paginas=ceil($num_filas/$tamanio_paginas);//ceil.-rounds the result of number of pages
            //--------------------------------pasted page-------------------



            $registros=$base->query("select * from $nombre_tabla order by apellido asc")->fetchAll(PDO::FETCH_OBJ);
            ///BOTON INSERTAR

            if(isset($_POST['btn_insertar'])){
                 echo "mostrar:::".$fe=$_GET['fecha'];
                $cedula=$_POST['Ced'];
                $nombre=$_POST['Nom'];
                $apellido=$_POST['Ape'];
                $asistencia=$_POST['Asi'];


				
                $sql="INSERT INTO $nombre_tabla (ci,nombre,apellido,asistencia)VALUES(:ced,:nom,:ape,:asi)";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":ced"=>$cedula,":nom"=>$nombre,":ape"=>$apellido, ":asi"=>$asistencia));
                
            }
            if(isset($_POST['btn_insertar'])){
                echo "mostrar:::".$fe=$_GET['fecha'];
              
           }
        ?>
           

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <table class="table table-hover table-responsive-sm fixed border border-dark" width="50%" border="0" align="center">
            <tr class="bg-dark text-light" >
				<td class=""><input type="hidden" value="Id"></td>
				<td class="">C.I</td>
				<td class="">Nombre</td>
				<td class="">Apellido</td>
				<td class="">Asistencia</td>
				<td colspan="2" class="text-center">Configuración</td>
				<!--if you remove the mandatory colspan you have to increase a<td>-->
            
            </tr> 
        
            <?php foreach($registros as $personas): // opens fields according to the number of data in the database?>	
            <tr>
            <td>
            <input type="hidden" value="<?php echo $personas->id ?> ">
            
            </td>
            <td><?php echo $personas->ci ?> </td>
            <td><?php echo $personas->nombre ?></td>
            <td><?php echo $personas->apellido ?></td>
            <td class="text-center">           
                <span ><?php echo $personas->asistencia ?></span>
                <br>
                <div class="badge badge-warning" >
                    <a href="bottom_opcion/tabla_consultar_si01.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->ci ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input   type='button' name='btn_si' id='del' value='si'>
                    </a>
                    <a href="bottom_opcion/tabla_consultar_no01.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->ci ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input   type='button' name='btn_no' id='del' value='no'>
                    </a>
                    
                  
                </div>
            </td>
        
            <td class="bot">
                <a href="tabla/tabla_consultar_borrar01.php?id=<?php echo $personas->id ?>">
                    <input type='button' name='del' id='del' value='Borrar'>
                </a>
            </td>
            
            <td class='bot'>
                <input type="hidden">
                <a href="tabla/tabla_consultar_editar01.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->ci ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input type='button' name='up' id='up' value='Actualizar'>
                </a>
            </td>
            </tr>       
            <tr>
            <?php endforeach; ?>
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
            <td></td>
            <td><input type="text" onkeypress='return validaNumericos(event)' maxlength="10" name='Ced' size='10' class='centrado' required></td>
            <td><input type="text" onkeypress="return soloLetras(event)"  name='Nom' size='10' class='centrado' required></td>
            <td><input type="text" onkeypress="return soloLetras(event)"  name='Ape' size='10' class='centrado' required></td>
            <td width="25%" style="width:18px; height:2px; margin:0;">
            
                    
                <div class="form-group" id="nn" >
                    
                    <select class="form-control"style="height:35px;" id="exampleFormControlSelect1" name="Asi"  required >
                    <option >si</option>
                    <option>no</option>
                    </select>
                </div>
            
            
            </td>

            

            <td class='bot'>
            <input type='submit' name='btn_insertar'  value='Insertar'>
            </td>
            <td> </td>
            </tr> 
            <tr>
                <td class="h-50"  colspan="4">
                <p class="badge badge-light">
                    <?php
                        for($i=1; $i<=$total_paginas; $i++){
                            // echo $i; esto que se imprime se trasforma en url  
                            echo"<a href='?pagina=".$i."'>".$i." Recargar </a>  "; 
                        
                            // echo "<a href='?pagina".$i."'>".$i."</a>  ";
                        }
                    ?>

                        
                </p>
               
                </td>
                <td colspan="3" >
                    
                </td>
            </tr>   
        </table>
        </form>
        </div>        
    </div>  

    <div class="row container justify-content-center">
        <div class="col-1">
            <form action="pdf_admin.php" method="POST">

            <input type="hidden" name="fecha" id="year">   
            <input type="hidden"value="<?php echo $_SESSION['tabla_seleccion'];?>" name="nombre_tabla">                      
            <script type="text/javascript">  
            document.getElementById("year").value=(f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
            </script>       
            
             <input type="submit"class="btn-danger" value="Generar Pdf">
                
            </form>
        </div>
    </div>  
                

<?php
    include_once('php/footer.php');
?>