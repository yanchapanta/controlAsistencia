<?php

    //TABLE ACCESS
    session_start();  
    $_SESSION['tabla_seleccion']=$_GET['asg'];
    $_SESSION['tabla_fecha']=$_GET['link_date'];
    
    header("Location:consultar01.php"); // Redir
?>