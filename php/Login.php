<?php 
error_reporting(E_ALL); ini_set('display_errors', 1); 

require_once'Conexion.php';
require_once'ControlSesiones.php';

class login{
  private $username,$password;
/**
 * Description 
 * @param type $username 
 * @param type $password 
 * @return type
 */
public function __construct($username,$password){
$this->username=$username;
$this->password=$password;
}


public function setUsername($username){
	$this->username=$username;
}

public function setPassword($password){
   $this->password=$password;
}
public function getUsername(){
	return $this->username;
}
public function getPassword(){
	return $this->password;
}

/**
 * Description
 *@author  Daniel avila
 * @method  loguear usuario 
 * @version  0.2
 * @return type
 */
public function verificarLogueo(){
	$usr=$this->getUsername();
	$pass=$this->getPassword();

	ConexionDBD::conection();
	$con=ConexionDBD::getConexion();
   
	$query="SELECT username, pass FROM  administrador WHERE username= ? AND pass= ?";
	if($stament=$con->prepare($query)){
    $stament->bind_param("ss",$usr,$pass);
     $stament->execute();
     $DB_query=$stament->get_result()
              or die(mysqli_error($con)."<br/>".$query);
     $stament->close();

      $datos_query=ConexionDBD::iterarQuery($DB_query);
      if($datos_query['username']==$usr && $datos_query['pass']==$pass){
       ControlSesion::iniciarSesion($usr);
       header("location:formpreguntas.php?sesion=sesion_iniciada");
      } else {
      	header("location:formlogin.php?error=datos_incorrectos");  	
        } 
	} else {
		var_dump($con->error);
	}
	 
	 
	 
}

}

 ?>