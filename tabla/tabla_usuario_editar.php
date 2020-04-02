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
	$ape=$_GET['ape'];
	$dir=$_GET['dir'];
}else{
	// What you have stored in the input are saved is the following varialbes
	$Id=$_POST['id'];
	$nom=$_POST['nom'];
	$ape=$_POST['ape'];
	$dir=$_POST['dir'];// Save what is in dir found below (input)
	$sql="UPDATE LOGIN SET username=:miNom, PASSWORD=:miApe, nivel=:miDir WHERE id=:miId";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":miId"=>$Id, ":miNom"=>$nom, ":miApe"=>$ape, ":miDir"=>$dir));
	header("Location:../usuarios.php");
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
      <td>Usuario</td>
      <td>
      <input type="text" required name="nom" id="nom" value="<?php echo $nom;?>"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
      <input type="text" required name="ape" id="ape" value="<?php echo $ape;?>"></td>
    </tr>
    <tr>
      <td>Nivel</td>
        <td width="100%">
            <div class="form-group" id="nn">
                
                <select class="form-control" id="exampleFormControlSelect1" name="dir" id="dir" value="<?php echo $dir;?>" width="100%">
                <option >Usuario</option>
                <option>Administrador</option>
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