<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?PHP
 include("../php/conexion.php");
 session_start();
$tabla=$_SESSION['nombre_tabla'];

$Id=$_GET['id'];
$base->query("DELETE FROM $tabla WHERE id='$Id'");
// This document is blank what the following code does is redirect
header("Location:../consultar.php");

?>

</body>
</html>


