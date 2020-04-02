<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?PHP include("../php/conexion.php");
session_start();
$tabla=$_SESSION['tabla_seleccion'];
$Id=$_GET['id'];
$ced=$_GET['ci'];
$nom=$_GET['nom'];
$ape=$_GET['ape'];
$dir=$_GET['dir'];
$ina='si';

$sql="UPDATE $tabla SET ci=:miCed,nombre=:miNom, apellido=:miApe, asistencia=:miIna WHERE id=:miId";
$resultado=$base->prepare($sql);
$resultado->execute(array(":miId"=>$Id, ":miCed"=>$ced, ":miNom"=>$nom, ":miApe"=>$ape, ":miIna"=>$ina));
	header("Location:../consultar01.php");

?>
</body>
</html>