<?php 
	require_once('php/acessos_datos_conexion.php');	 

	$mysqli=new mysqli($db_host,$db_usuario,$db_contra,$db_nombre); //server, database user, user password, database name
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	$acentos = $mysqli->query("SET NAMES 'utf8'");

	$nom_tabla=$_POST['nombre_tabla'];

		//$Id=$_GET['id'];
	$variable1=$_POST['fecha'];//$_GET['id_fecha'];
	
		//echo $fecha=$_GET['fecha'];
	
	

//$usuario = "SELECT * FROM  redes ORDER BY apellido DESC";	

$usuario = "SELECT * FROM  ".$nom_tabla." ORDER BY apellido asc";	
	$usuarios=$mysqli->query($usuario);
	
if(!isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
  
  $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Miguel Caro');
	$pdf->SetTitle($nom_tabla,$variable1);//$nom_tabla,$variable1
	//$pdf->SetValue($fecha);
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '
		<div style="display: flex; align-items: center;" >
			<div style=" display:block; padding: 10px; " width="500"> 
				 
			</div>
		    <div style="display:block; padding: 10px; text-align:center;" width="500"> 
				<span style="font-size: 25px; ">			
					INSTITUTO TECNOLÓGICO VIDA NUEVA    		 
		    	</span>
			</div>
			
			<br>
			<br>
		</div>	   
		
			 Quito, '.$variable1.' 
			 	
	';
    
	
	$content .= '
        <h1>Sistema de Reportes</h1>
   
		<div class="row">
					<div class="col-md-12">						
            	<h1 style="text-align:center;" color="" size=4> Listado de Asignatura   '.$nom_tabla.'</h1>
       	
      <table border="1" cellpadding="5" >
        <thead>
          <tr  style="color:#FDFEFE	; " bgcolor="black">
            <th><b>Ci</b></th>
            <th><b>Nombre</b></th>
            <th><b>Apellido</b></th>
            <th><b>Asistencia</b></th>
          </tr>
        </thead>
	';
	
	
	while ($user=$usuarios->fetch_assoc()) { 
			if($user['asistencia']=='no'){  $color= '#D6EAF8'; }else{ $color= '#f5f5f5'; }
	$content .= '
		<tr bgcolor="'.$color.'">
            <td>'.$user['ci'].'</td>
            <td>'.$user['nombre'].'</td>
            <td>'.$user['apellido'].'</td>
            <td>'.$user['asistencia'].'</td>
        </tr>
	';
	}


	
	$content .= '</table>';
	
	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
				<span>Creador del sistema  </span>
				<a href="invitado_asistencias.php" style="">miweb.com</a> por Marco Yanchapanta.
            </div>
        </div>
    	
	';
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
  $pdf->output('Reporte.pdf', 'I');
  
}

?>
