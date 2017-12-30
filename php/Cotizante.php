<?php 
/**
 *@category  Class Topayweb
 * @author  Dan5erver
 * Clase Abstracta Cotizante
 */
abstract class CotizanteAbstract {
    private $nombre,$telefono,$identificacion,$email;

	public function __construct($nombre,$telefono,$identificacion,$email){
     $this->nombre=$nombre;
     $this->telefono=$telefono;
     $this->identificacion=$identificacion;
     $this->email=$email;
	}

		 /**
   * Description
   * Metodos setter para el acceso de las propiedades
   * @param type $nombre 
   * @return type
   */
  public function setNombre($nombre){
  $this->nombre=$nombre;
  }
   public function setTelefono($telefono){
  $this->telefono=$telefono;
  }
   public function setIdentificacion($identificacion){
  $this->identificacion=$identificacion;
  }
   public function setEmail($email){
  $this->email=$email;
  }

   /**
    * Description
    * Metodos getter para obtener valores de la instancia
    * @return type
    */
  public function getNombre(){
  	return $this->nombre;
  }
   
    public function getTelefono(){
  	return $this->telefono;
  }
   public function getIdentificacion(){
  	return $this->identificacion;
  }
   public function getEmail(){
  	return $this->email;
  }
 
/**
 * Description Metodo abstract para implementar
 * @param type Array $datos 
 * @return type
 */
abstract public function saveDatos();
abstract public function mostrarCotizantes();

}
?>



