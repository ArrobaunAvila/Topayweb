<?php
    include('Conexion.php');

     /**
      * @author  DAn5erver
      * @Description Archivo que recibe los valores por medio de ajax
      */
    
      if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){ 
      if($_POST['tipoweb'] != "Selecciona" && $_POST['diseño'] != "Selecciona" && $_POST['web_pagos'] != "Selecciona"
       && $_POST['integracion_app'] != "Selecciona" && $_POST['multidioma'] != "Selecciona" && $_POST['registro_usuarios'] != "Selecciona" && $_POST['buscador_directorio'] != "Selecciona" && $_POST['precio_euro'] != "Selecciona"){

        $r_tipoweb = $_POST['tipoweb'];
        $r_diseño = $_POST['diseño'];
        $r_webpagos= $_POST['web_pagos'];
        $r_integraccion= $_POST['integracion_app'];
        $r_multidioma= $_POST['multidioma'];
        $r_registro= $_POST['registro_usuarios'];
        $r_buscador= $_POST['buscador_directorio'];
        $precio_euro=$_POST['precio_euro'];
        ConexionDBD::conection();
       $con =ConexionDBD::getConexion();
       
            $query="SELECT * FROM usuarios";
$state=$con->prepare($query);
$state->execute();
$DB_result=$state->get_result();
$datos = ConexionDBD::iterarQuery($DB_result);
     $id = $datos[0];

$consulta="INSERT INTO cotizacion (tipo_web,diseño,web_pagos,integraccion,multidioma
,registro_usuarios,buscador,preci_euro,user_id) values (?,?,?,?,?,?,?,?,?)";
    if($stament=$con->prepare($consulta)){
      $stament->bind_param("sssssssss",$r_tipoweb,$r_diseño,$r_webpagos,$r_integraccion,$r_multidioma,$r_registro,$r_buscador
        ,$precio_euro,$id);
      $stament->execute();
      $DB_query=$stament->get_result()
      or die(mysqli_error($con)."<br/>".$precio_euro); 
      $stament->close(); 
      ConexionDBD::cerrarConexion();
      } 
  } else {
        echo "false";
      }   
}
  ?>
