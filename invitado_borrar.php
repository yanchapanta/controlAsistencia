<?php

    //ACCESS FOR TABLE
    session_start();
  
    $_SESSION['nombre_tabla']=$_POST['cons'];
    
    header("Location:invitado_consultar.php"); // Redir
?>