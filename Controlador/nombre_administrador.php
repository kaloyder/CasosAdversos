<?php 
session_start();
if (@$_SESSION['login']==true) {
	echo $_SESSION['nombre'];
}else{
	echo "Administrador";
}
	
 ?>