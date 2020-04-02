<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?PHP include("../php/conexion.php");
$Id=$_GET['id'];
$base->query("DELETE FROM LOGIN WHERE id='$Id'");
// This document is blank what the following code does is redirect
header("Location:../usuarios.php");


?>
</body>
</html>