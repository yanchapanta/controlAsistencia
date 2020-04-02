<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php 
session_start();
$tabla=$_SESSION['tabla_seleccion'];
// THE PAGE IS DOWN ON THE SAME PAGE
include ("../php/conexion.php");
// El nombre de las variables son nombres cualquiera
//Rescatamos el valor de la URL
if(!isset($_POST["bot_actualizar"])){//si no ha actualizado el boton de actualizar
  $Id=$_GET['id'];
	$ci=$_GET['ci'];  
	$nom=$_GET['nom'];
	$ape=$_GET['ape'];
	$dir=$_GET['dir'];
}else{
	//Lo que haya almacenado en el input se guardan es las siguientes varialbes
  $Id=$_POST['id'];
  $ci=$_POST['ci'];
	$nom=$_POST['nom'];
	$ape=$_POST['ape'];
	$dir=$_POST['dir'];//Guarda lo que hay en dir que se encuestra mas abajo (input)
	$sql="UPDATE $tabla SET ci=:miCi, NOMBRE=:miNom, APELLIDO=:miApe, ASISTENCIA=:miDir WHERE id=:miId";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":miId"=>$Id,"miCi"=>$ci, ":miNom"=>$nom, ":miApe"=>$ape, ":miDir"=>$dir));
	header("Location:../consultar01.php");
	}

?>
<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php 	echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
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
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value=" <?php echo $Id;?>"></td>
    </tr>
    
    

    <tr>
      <td>C.I</td>
      <td><label for="nom"></label>
      <input type="text" onkeypress='return validaNumericos(event)' maxlength="10" name="ci" id="nom" required value="<?php echo $ci;?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" onkeypress="return soloLetras(event)" name="nom" id="nom" required value="<?php echo $nom;?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" onkeypress="return soloLetras(event)" name="ape" id="ape" required value="<?php echo $ape;?>"></td>
    </tr>
    <tr>
      <td>Asistencia</td>
      <td width="50%" style="width:18px; height:2px; margin:0;">
            <label for="dir"></label>
                    
            <div class="form-group" id="nn" >
                
                <select class="form-control"style="height:35px; width:100%;"name="dir"  id="dir" required value="<?php echo $dir;?>"> >
                <option >si</option>
                <option>no</option>
                </select>
            </div>
        
        
        </td>

     </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>