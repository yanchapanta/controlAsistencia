<?php
include_once ("php/acessos_datos_conexion.php");
$host=$db_host;


$user=$db_usuario;

$password=$db_contra;

$db=$db_nombre;

$con = new mysqli($host,$user,$password,$db);

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
		
			
            $user_id=null;
            $nivel=null;
			$sql1= "select * from login where (username=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
                $user_id=$r["username"];
                $nivel=$r["nivel"];
				break;
			}
			if($user_id==null){

				print "<script>alert(\"Acceso invalido.\");window.location='index.php';</script>";
			}else{
                if($nivel=="Administrador"){  
                               
                      

                    session_start();
                    if(session_destroy()) // Destroying All Sessions
                    {	header("Location:inicio.php"); // Redirecting To Home Page
                
                    }
                    
                                   
                }else{
                    session_start();
                    if(session_destroy()) // Destroying All Sessions
                    {	header("Location:invitado_inicio.php"); // Redirecting To Home Page
                
                    }
                    
                }
				session_start();
                $_SESSION["usuario"]=$user_id;
                $_SESSION["dueno"]=$nivel;
            }
		}
	}
}



?>