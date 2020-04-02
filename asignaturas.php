<style type="text/css">
    .oka_asignatura{
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


	
	<!-- main title -->
    <div class="row">
        <div class="col">
        <p style="font-size:40px;font-family: 'Times New Roman', Times, serif"> <b>Asistencia por Asignatura</b>
        </p>
        </div>
    </div>

    <!--- subject content --->
    <div class="row justify-content-center">
       <div class="col-10 border">
       <form class="form-inline my-2 my-lg-0" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">  <h2>Crear Nueva Asignatura &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h2>
                <input class="form-control mr-sm-2"  name="new" type="search" placeholder="New Subject" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="btn_new" type="submit">Create</button>
                <button class="btn btn-outline-success my-2 my-sm-0" name="btn_drop" type="submit">Eliminar</button>
        </form>
            <?php
          
            if(isset($_POST['btn_new'])){
           error_reporting(0);
            $nombre=$_POST['new'];
            $sql="
            CREATE TABLE IF NOT EXISTS $nombre (
            id int(11) NOT NULL AUTO_INCREMENT,
            ci varchar(10) NOT NULL,
            nombre varchar(255) COLLATE utf8_spanish_ci NOT NULL,
            apellido varchar(255) COLLATE utf8_spanish_ci NOT NULL,
            asistencia varchar(255) COLLATE utf8_spanish_ci NOT NULL,
            PRIMARY KEY (id)
            )";
            $resultado=$base->prepare($sql);
            $resultado->execute(array());

           
            $insertar="INSERT INTO new (asignatura) values ('$nombre')";
            $resultado=$base->prepare($insertar);
            $resultado->execute(array());
            print "<script>alert(\"Se ha guardado!\");window.location='asignaturas.php';</script>";
            }
			
			if(isset($_POST['btn_drop'])){
				error_reporting(0);
				$nombre=$_POST['new'];
				$sql="DROP TABLE IF EXISTS $nombre";
				$resultado=$base->prepare($sql);
				$resultado->execute(array());

			   
				$insertar="DELETE FROM new WHERE asignatura = '$nombre'";
				$resultado=$base->prepare($insertar);
				$resultado->execute(array());
				print "<script>alert(\"Se eliminado correctamente!\");window.location='asignaturas.php';</script>";
            }
      

        ?>
       </div>
    </div>




<?php
    include_once('php/footer.php');
?>