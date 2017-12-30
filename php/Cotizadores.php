<?php 
require_once('Cotizante.php');
require_once'server.php';
/**
* Class Cotizantes
*/
class Cotizante extends CotizanteAbstract{
  /**
   * Description Metodos guardarDatos y MostrarDatos
   * @author  Dan5erv3r
   * @param type $datos 
   * @return type
   */
  public function saveDatos() {

  	$name =$this->getNombre();
  	$identificacion=$this->getIdentificacion();
  	$telefono=$this->getTelefono();
  	$email=$this->getEmail();
     $url=header("location:formpreguntas.php?informe=campos_enviados");
  	ConexionDBD::conection();
  	$conec=ConexionDBD::getConexion();

  	$consulta="INSERT INTO usuarios (nombre,identificacion,telefono,email) values (?,?,?,?)";
  	if($stament=$conec->prepare($consulta)){
  		$stament->bind_param("ssss",$name,$identificacion,$telefono,$email);
  		$stament->execute();
  		$DB_query=$stament->get_result();
  		$stament->close(); 
  		ConexionDBD::cerrarConexion();
  	}
  }


public function mostrarCotizantes(){
  
}
  } 

  

 ?>












