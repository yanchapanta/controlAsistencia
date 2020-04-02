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
// THE PAGE IS DOWN ON THE SAME PAGE
include ("../php/conexion.php");

			
// The names of the variables are any names
// We rescue the URL value
if(!isset($_POST["bot_actualizar"])){//si no ha actualizado el boton de actualizar
	$Id=$_GET['id'];
  $nom=$_GET['nom'];
  
}else{
	// What you have stored in the input are saved is the following varialbes
	$Id=$_POST['id'];
	$nom=$_POST['nom'];
	$sql="UPDATE ASIGNATURAS SET ASIGNATURA=:miNom WHERE id=:miId";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":miId"=>$Id, ":miNom"=>$nom));
	header("Location:../asignaturas.php");
	}

?>
<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php 	echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value=" <?php echo $Id;?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom;?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>