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

    <!--Title Subject -->
    <div class="row justify-content-center"> 
        <div class="col-12 col-sm-5 ">
            <div class="border border-primary" style="padding:10px;">
                   <label class="text-primary" for="check">Asignatura :</label> 
                    
                    
                    <!--Call the saved subject-->
                    <?php $registros=$base->query("SELECT*FROM new")->fetchAll(PDO::FETCH_OBJ);?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        
                    <!--Selection button-->
                        <select  class="form-control" id="datepicker" onChange=nav(this.value) name="combo1">
                        <OPTION selected disabled> Código Asignatura</OPTION>
                        <?php foreach($registros as $personas): // opens fields according to the number of data in the database ?>

                            <OPTION value="borrar01.php?asg=<?php echo $personas->asignatura ?>">
                                <?php echo $personas->asignatura ?>
                            </OPTION>
                            
                            
                        <?php endforeach; ?>
                        </select>  
                            
                    </form>
            



                <!--SEARCH FOR ------------------------------------------------------------------------------------------------>
                <br>
                <label class="text-primary" for="check"> Código :</label> 
                    
                    <form class="form-inline my-2 my-lg-0" action="borrar.php" method="post">  <h3 class="text-center"><b>Buscar por código</b></h3>
                        <input class="form-control mr-sm-2" required  name="cons" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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