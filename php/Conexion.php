<?php
/**
* error_reporting(-1);
*/
class ConexionDBD {     
	/* las propiedades static pueden ser accedidas desde cualquier parte
	sin instanciar la clase
	*/
    private static $conexion;

	public static function conection()
	{       //self::  es el metodo el cual nos permite acceder a los atributos u metodos de la clase

		$BD_user='root'; //propiedades estaticas 
	    $BD_host='localhost:3306';
	    $BD_pass='danserver';
	     $BD_datos='topayweb';
        
		self::$conexion = new mysqli($BD_host,$BD_user,$BD_pass,$BD_datos);
		
		if (mysqli_connect_error()) {
		
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
         }
	}


    //Metodo cerrarConexion()
    public static function cerrarConexion($conexion)
    {
    	if(isset($conexion)){
           mysqli_close($conexion);
    	}
    }
 
     //Metodo getter Conexion
	public static function getConexion()
	{
		return self::$conexion;
	}

	//Metodo para manipulacion de datos
	public static function iterarQuery($query){
        return mysqli_fetch_array($query);
	}

	public static function countQuery($query){
         return mysqli_num_rows($query);
	}
}

 //ConexionDBD::conection();

  ?>