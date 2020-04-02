<?php
    include_once('invitado_header.php');

                  
    if(error_reporting(0)){
        session_start();
    
    } 
    
    //TABLE ACCESS
    $nombre_tabla= $_SESSION['nombre_tabla'];
?>

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
                &time; llama un elemeto "x "
                -->
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Como usar!</strong>, para ver toda la información tiene que deslizar con el dedo, de derecha a izquierda. 
                </p>
            </div>
        </div>
    
    <!-- content of the networks table -->
    
    <div class="row justify-content-center">
        <!--TABLE OF CONTENTS OF THE USER-->
        <div class="col col-md-4">
        <?php
        
            //--------------------------------pasted page-------------------
            $tamanio_paginas=30;//1
                if(isset($_GET["pagina"])){
                    
                        if($_GET["pagina"]==0){
                            header("Location:invitado_consultar.php");
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
                $total_paginas=ceil($num_filas/$tamanio_paginas);//ceil.-round the result of number of pages
            //--------------------------------pasted pagination-------------------


            $registros=$base->query("select * from $nombre_tabla order by apellido asc")->fetchAll(PDO::FETCH_OBJ);

        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <table class="table table-hover table-responsive-sm fixed border border-dark"  width="50%" border="0" align="center">
            <tr class="bg-dark text-light" >
            <td class=""><input type="hidden" value="Id"> </td>
            <td class="">C.I</td>
            <td class="">Nombre</td>
            <td class="">Apellido</td>
            <td class="sin">Asistencia</td>
            <!--if you remove the mandatory colspan you have to increase a<td>-->
            
            </tr> 
        
            <?php foreach($registros as $personas): // te opens fields according to the number of data in the database?>	
            <tr>
            <td >
            <input type="hidden" value="<?php echo $personas->id?> ">
            </td>
            <td><?php echo $personas->ci ?> </td>
            <td><?php echo $personas->nombre ?></td>
            <td><?php echo $personas->apellido ?></td>
            <td class="text-center">           
                <span ><?php echo $personas->asistencia ?></span>
                <br>
                <div class="badge badge-warning" >
                    <a href="bottom_opcion/invitado_tabla_consultar_si.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->ci ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input   type='button' name='btn_si' id='del' value='si'>
                    </a>
                    <a href="bottom_opcion/invitado_tabla_consultar_no.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->ci ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input   type='button' name='btn_no' id='del' value='no'>
                    </a>
                    
                  
                </div>
            </td>
            </tr>       
            <tr>
            <?php endforeach; ?>
            
            
                <td class="h-50"  colspan="4">
                <p class="badge badge-light">
                    <?php
                        for($i=1; $i<=$total_paginas; $i++){
                            // echo $i; this that is printed is transformed into url 
                            echo"<a href='?pagina=".$i."'>".$i."Recargar</a>  "; 
                        
                            // echo "<a href='?pagina".$i."'>".$i."</a>  ";
                        }
                    ?>

                        
                </p>
               
                </td colspan="3">
                <td>
                    
                </td>
            </tr>   
           
        </table>
        </form>
        </div>        
    </div> 
    <div class="row container justify-content-center">
        <div class="col-1">
            <form action="pdf_invitado.php" method="POST">

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