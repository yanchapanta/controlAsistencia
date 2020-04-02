<?php

    //TABLE ACCESS
    session_start();  
    $_SESSION['tabla_seleccion']=$_GET['asg'];
    
    header("Location:invitado_consultar01.php"); // Redir
?>