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
    include_once('php/conexion.php');
?>
 
	<!-- MAIN TITTLE -->
    <div class="row">
        <div class="col text-center">
        <p style="font-size:40px;font-family: 'Times New Roman', Times, serif"> <b>Información del Usuario</b>
        </p>
        </div>
    </div>
    <div class="row">
        <div class="col ">
        <a href="formulario_registro_usuario.php" class="btn btn-outline-warning text-light float-right bg-dark"><i class="fa fa-users">
                    </i> Configuración Usuario
                </a>
        </div>
        
    </div>
    <!-- table content -->
    
    <div class="row justify-content-center">
        <!--TABLE OF CONTENTS OF THE USER-->
        <div class="col-12 col-md-7">
        <?php       
      
        //--------------------------------pasted page-------------------
        $tamanio_paginas=30;//1
            if(isset($_GET["pagina"])){
                
                    if($_GET["pagina"]==0){
                        header("Location:usuarios.php");
                    }else{
                        
                       $pagina= $pagina=$_GET["pagina"];
                    }
                
                }else{ $pagina=1;}
                
            
                    
            
            //$pagina=1;//2
            $emprezar_desde=($pagina-1)*$tamanio_paginas;
            $sql_total="SELECT*FROM login";
            $resultado=$base->prepare($sql_total);
            $resultado->execute(array());
            $num_filas=$resultado->rowCount();//3   shows the number of rows
            $total_paginas=ceil($num_filas/$tamanio_paginas);//ceil.-round the result of number of pages
        //--------------------------------pasted page-------------------




        $registros=$base->query("select * from login order by username asc")->fetchAll(PDO::FETCH_OBJ);
        ///INSERT BUTTON
         

        ?>
		
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <table class="table table-hover table_-responsive border border-dark" width="50%" border="0" align="center">
            <tr class="bg-dark text-light" >
                <td class="">Id</td>
                <td class="">User</td>
                <td class="">Password</td>
                <td class="">Nivel-Acesso</td>
            </tr> 
        
        
            <?php foreach($registros as $personas): // opens fields according to the number of data in the database ?>	
            <tr>
                <td><?php echo $personas->id ?> </td>
                <td><?php echo $personas->username ?> </td>
                <td><?php echo $personas->password ?></td>
                <td><?php echo $personas->nivel ?></td>
            
                
            </tr>       
            
            <?php endforeach; ?>
            
           
            <tr>
                <td class="h-50"  colspan="4">
                    <p class="badge badge-light">
                        
                            <?php
                    //-------------------PAGINATION----------------------------------------------
                                for($i=1; $i<=$total_paginas; $i++){
                                    // echo $i; this that is printed is transformed into url
                                    echo"<a href='usuarios.php?pagina=".$i."'>".$i."Recargar</a> "; 
                                
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