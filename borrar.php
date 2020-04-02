<?php

    //TABLE ACCESS
    session_start();
  
    $_SESSION['nombre_tabla']=$_POST['cons'];
    
    header("Location:consultar.php"); // Redir
?>

