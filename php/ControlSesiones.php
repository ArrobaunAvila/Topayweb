<?php 
class ControlSesion{

public static function iniciarSesion($usr){
     session_start();
   $_SESSION['admin'] = $usr;
}

public static function cerrarSesion(){

	if(isset($_SESSION['admin'])){
  		unset($_SESSION['admin']); 
  		session_destroy();     
	} else {
    unset($_SESSION['admin']); 
      session_destroy();  
  }
	header('location: ../formlogin.php');
}

public static function sesionIniciada(){
  if(isset($_SESSION['admin'])){
     return true;
  } else {
  	return false;
  }
}

}

 ?>