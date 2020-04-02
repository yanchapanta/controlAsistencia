<?php
    include_once('header.php');


    //TABLE FOR ACCESS
    $nombre_tabla="sistemas";
    $_SESSION['nombre_tabla']=$nombre_tabla;
?>

    <!-- ACCESS OF DATA -->
    <div class="row">
        <div class="col">
            <!----Customer data and access level-->
                <b class="text-end text-primary" id="welcome">
                Bienvenido : 
                    <i>
                    <?php
                    echo $_SESSION['usuario'];
                    echo "<br>";
                    echo "Nivel: ".$_SESSION['clave'];
                    
                    ?> 

                    </i>
                </b>
        </div>        
    </div>
    <!-- current date -->
    <div class="row">
        <div class="col"> 
            <p class="display-4 text-center" >  
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
                    <script >
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                        var f=new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
                    </script>
                </a>                
        </p>
        </div>
    </div>
    <!-- MAIN TITTLE -->
    <div class="row">
        <div class="col">
        <p style="font-size:40px;font-family: 'Times New Roman', Times, serif"> <b><?php echo $nombre_tabla;?></b>
        </p>
        </div>
    </div>
    
    <!-- content of the networks table -->
    
    <div class="row justify-content-center">
        <!--TABLA DE OCNTENIDO DEL USUARIO-->
        <div class="col-md-4">
        <?php
       
      
        //--------------------------------pasted page-------------------
        $tamanio_paginas=4;//1
            if(isset($_GET["pagina"])){
                
                    if($_GET["pagina"]==0){
                        header("Location:$nombre_tabla.php");
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
        //--------------------------------pasted page-------------------




        $registros=$base->query("SELECT*FROM $nombre_tabla LIMIT $emprezar_desde,$tamanio_paginas")->fetchAll(PDO::FETCH_OBJ);
        ///INSERT BUTTON

        if(isset($_POST['btn_insertar'])){
           
            $cedula=$_POST['Ced'];
            $nombre=$_POST['Nom'];
            $apellido=$_POST['Ape'];
            $asistencia=$_POST['Asi'];
            $sql="INSERT INTO $nombre_tabla (ci,nombre,apellido,asistencia)VALUES(:ced,:nom,:ape,:asi)";
            $resultado=$base->prepare($sql);
            $resultado->execute(array(":ced"=>$cedula,":nom"=>$nombre,":ape"=>$apellido, ":asi"=>$asistencia));
            
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <table class="table table-hover border border-dark" width="50%" border="0" align="center">
            <tr class="bg-dark text-light" >
            <td class="">Id</td>
            <td class="">C.I</td>
            <td class="">Nombre</td>
            <td class="">Apellido</td>
            <td class="sin">Asistencia</td>
            <td colspan="2" class="text-center">Configuración</td>
            <!--if you remove the mandatory colspan you have to increase a<td>-->
            
            </tr> 
        
            <?php foreach($registros as $personas): // opens fields according to the number of data in the database ?>	
            <tr>
            <td><?php echo $personas->id ?> </td>
            <td><?php echo $personas->ci ?> </td>
            <td><?php echo $personas->nombre ?></td>
            <td><?php echo $personas->apellido ?></td>
            <td class="text-center">           
                <span ><?php echo $personas->asistencia ?></span>
                <br>
                <div class="badge badge-warning" >
                    <a href="bottom_opcion/tabla_redes_si.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->id ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input   type='button' name='btn_si' id='del' value='si'>
                    </a>
                    <a href="bottom_opcion/tabla_redes_no.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->id ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input   type='button' name='btn_no' id='del' value='no'>
                    </a>
                    
                  
                </div>
            </td>
        
            <td class="bot">
                <a href="tabla/tabla_redes_borrar.php?id=<?php echo $personas->id ?>">
                    <input type='button' name='del' id='del' value='Borrar'>
                </a>
            </td>
            
            <td class='bot'>
                <a href="tabla/tabla_redes_editar.php?id=<?php echo $personas->id ?> & ci=<?php echo $personas->id ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->asistencia ?>">
                        <input type='button' name='up' id='up' value='Actualizar'>
                </a>
            </td>
            </tr>       
            <tr>
            <?php endforeach; ?>
            
            <td></td>
            <td><input type='text' name='Ced' size='10' class='centrado' required></td>
            <td><input type='text' name='Nom' size='10' class='centrado' required></td>
            <td><input type='text' name='Ape' size='10' class='centrado' required></td>
            <td><input type='text' name='Asi' size='10' class='centrado' required></td>
            <td class='bot'>
            <input type='submit' name='btn_insertar'  value='Insertar'>
            </td>
            <td></td>
            </tr> 
            <tr>
                <td class="h-50"  colspan="6">
                <p class="badge badge-light">
                    <?php
                        for($i=1; $i<=$total_paginas; $i++){
                            // echo $i; this that is printed is transformed into url 
                            echo"<a href='?pagina=".$i."'>".$i."</a>  "; 
                        
                            // echo "<a href='?pagina".$i."'>".$i."</a>  ";
                        }
                    ?>

                        
                </p>
               
                </td>
            </tr>   
        </table>
        </form>

        </div>
        
    </div>  
    






<?php
   include_once('php/footer.php');
?>