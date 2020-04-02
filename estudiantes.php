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

 
 
	
	<div class="row">
        <div class="col">
        <p style="font-size:40px;font-family: 'Times New Roman', Times, serif"> <b>Asistencia por Asignatura</b>
        </p>
        </div>
    </div>
    
    <!-- selection menu -->
                
    <div class="row">
        <div class="col">
            <form class="form-inline my-2 my-lg-0" action="nuevoAlumno.php"  method="post">
                <button class="btn btn-outline-warning btn-lg btn-block" name="btn_new" type="submit">   <h2> Desea Ingresar Nuevo Alumno &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h2>     </button>
            </form>  
        </div>
    </div>  




<br><br><br><br><br><br><br><br>
<?php
include_once('php/footer.php');
?>