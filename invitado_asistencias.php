<?php
    include_once('invitado_header.php');
?>

<div class="container-fluid">
    <!-- main title -->
    <div class="row justify-content-center">
        <div class="col-12 col-sm-5">
        <p class="text-center" style="font-size:40px;font-family: 'Times New Roman', Times, serif"> <b>Consultar en el Sistema</b>
        </p>
        </div>
    </div>
</div>
    
<div class="container-fluid ">

    <!-- Title Subject -->
    <div class="row justify-content-center"> 
        <div class="col-12 col-sm-5 ">
            <div class="border border-primary" style="padding:10px;">
                   <label class="text-primary" for="check">Asignatura :</label> 
                    
                    
                    <!--Call the saved subject-->
                    <?php $registros=$base->query("SELECT*FROM new")->fetchAll(PDO::FETCH_OBJ);?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!--BUTTON SELECTION-->
                        <select style="width:190px; margin:0;" class="form-control" id="check" onChange=nav(this.value) name="combo1">
                            <OPTION  selected disabled > Código Asignatura</OPTION>
                            <?php foreach($registros as $personas): // opens fields according to the number of data in the database ?>

                            <OPTION   value="invitado_borrar01.php?asg=<?php echo $personas->asignatura ?>">
                            <?php echo $personas->asignatura ?>
                            </OPTION>
                        <?php endforeach; ?>
                        </select>                
                    </form>
            



                <!--RESEARCH ------------------------------------------------------------------------------------------------>
                <br>
                <label class="text-primary" for="check"> Código :</label> 
               
                                
                    <form class="form-inline my-2 my-lg-0" action="invitado_borrar.php" method="post"> 
                    
                        <input class="form-control mr-sm-2"  name="cons" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-lg-0" type="submit">Buscar</button>
                    </form>
            </div>
        </div>
    </div>
</div>







<br><br><br>

   
<div class="container">
   <div class="row   justify-content-around">
       <div class="col-6 col-sm-4 col-md-2" style="width:150px; margin:0;padding:10px;">
                        
            <div class="border border-primary" style="width:150px; margin:0;padding:10px;">
                
                <a style="text-decoration:none; color:black; font-size:50px;"href="#">
                <button type="button" class="btn btn-warning">            
                <img class="img img-fluid" src="imagen/asistencias/network.png" alt="">
                <p  class="text-center"style="text-decoration:none; color:black; font-size:15px;"  >Redes de <br> Computación I</p>

                </button>            
                </a>
            </div>   
       </div>

        <div class="col-6 col-sm-4 col-md-2" style="width:150px; margin:0;padding:10px;">         
            <div class="border border-primary" style="width:150px; margin:0;padding:10px;">
                
                <a style="text-decoration:none; color:black; font-size:50px;"href="#">
                <button type="button" class="btn btn-warning">            
                <img class="img img-fluid" src="imagen/asistencias/developer.png" alt="">
                <p  class="text-center"style="text-decoration:none; color:black; font-size:15px;"  >Programación <br> Web II</p>

                </button>            
                </a>

            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-2" style="width:150px; margin:0;padding:10px;">         
            <div class="border border-primary" style="width:150px; margin:0;padding:10px;">
                
                <a style="text-decoration:none; color:black; font-size:50px;"href="#">
                <button type="button" class="btn btn-warning">            
                <img class="img img-fluid" src="imagen/asistencias/system.png" alt="">
                <p  class="text-center"style="text-decoration:none; color:black; font-size:15px;"  >Sistemas <br> Operativos I</p>
                
                </button>            
            </a>
                
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-2" style="width:150px; margin:0;padding:10px;">         
            <div class="border border-primary" style="width:150px; margin:0;padding:10px;">
                
                <a style="text-decoration:none; color:black; font-size:50px;"href="#">
                <button type="button" class="btn btn-warning">            
                <img class="img img-fluid" src="imagen/asistencias/languaje.png" alt="">
                <p  class="text-center"style="text-decoration:none; color:black; font-size:15px;"  >Lengujes <br> Visuales I</p>
                
                </button>            
                </a>
                
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-2" style="width:150px; margin:0;padding:10px;">         
            <div class="border border-primary" style="width:150px; margin:0;padding:10px;">
                
                <a style="text-decoration:none; color:black; font-size:50px;"href="#">
                <button type="button" class="btn btn-warning">            
                <img class="img img-fluid" src="imagen/asistencias/check.png" alt="">
                <p  class="text-center"style="text-decoration:none; color:black; font-size:15px;"  >Audiroria <br> de Sistemas</p>

                </button>            
                </a>
                
            </div>
        </div>     
   </div>

</div>

<?php
    include_once('php/footer.php');
?>