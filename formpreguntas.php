<?php 
require_once'php/ControlSesiones.php';
require_once'php/Cotizadores.php';
include("php/Login.php");
session_start();
if(ControlSesion::sesionIniciada()){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(!empty($_POST["nombre"] && !empty($_POST["identificacion"])&& !empty($_POST["telefono"])&& !empty($_POST["email"]))){
            $name=$_POST['nombre'];
            $identificacion=$_POST['identificacion'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email']; 

          $cotizador = new Cotizante($name,$telefono,$identificacion,$email);
           $cotizador->saveDatos();
      } else{
        header("location:formpreguntas.php?informe=campos_vacios");
    }
  } 
} else{
	session_start();
	session_destroy();
	header('location:formlogin.php?error=inicio_sesion');
	exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
	<title>ToPayWeb</title>
	<link rel="stylesheet" type="text/css" href="css/milligram.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="alertifyjs/css/themes/default.css">
	 <link rel="stylesheet" type="text/css" href="css/milligram.css">
	<link rel="icon" href="img/if_cloud_1287533.svg">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css">
</head>
<style type"text/css">
body{
	background: url('img/titanium.jpg');
	overflow: hidden;
	height: 900px;
}
</style>
<body>
<?php include'php/header.php';?>
 <div class="app-container-cotizacion">
	 <div id="app-cotizador">
	     <a class="icon fa-close close-modal"><span class="label">Cerrar</span></a>
	   <h2> Quoting web</h2>
	 	<form id="form">
	 		 <p class="labeli">Tipo Web:</p>
                <select class="select-cotiza" id="tipowe" name="tipoweb">
                      <option>Selecciona</option>
                      <option class="optiones" value="350">E-commerce/Tienda online</option>
                      <option class="optiones" value="150">Web blog</option>
                      <option class="optiones" value="450">Web empresa/corporativa</option>
                      <option class="optiones" value="750">Web a medida</option>
                </select>
                <p class="labeli">Diseño:</p>
                <select class="select-cotiza" id="diseño" name="diseño">
                      <option>Selecciona</option>
                      <option class="optiones" value="30">Plantilla</option>
                      <option class="optiones" value="150">Diseño a medida</option>
                      <option class="optiones" value="0">No nesecito</option>
                      <option class="optiones" value="75"> No sé</option>
                </select>
					<p class="labeli">Web de Pagos:</p>
                <select class="select-cotiza" id="web_pagos" name="web_pagos">
                      <option>Selecciona</option>
                      <option class="optiones" value="300">Si</option>
                      <option class="optiones" value="0">No</option>
                      <option class="optiones" value="200"> No sé</option>
                </select>

                	<p class="labeli">Integracion App:</p>
                <select class="select-cotiza" id="integracion_app" name="integracion_app">
                      <option>Selecciona</option>
                      <option class="optiones" value="400">Si</option>
                      <option class="optiones" value="0">No</option>
                      <option class="optiones" value="150"> No sé</option>
                </select>
                 	<p class="labeli">Multidioma:</p>
                <select class="select-cotiza" id="multidioma" name="multidioma">
                      <option>Selecciona</option>
                      <option class="optiones" value="400">Si</option>
                      <option class="optiones" value="0">No</option>
                      <option class="optiones" value="250"> No sé</option>
                </select>
                <div class="segment-two">
                	<p class="labeli">Registro Usuarios:</p>
                     <select class="select-cotiza" id="registro_usuarios" name="registro_usuarios">
                      <option>Selecciona</option>
                      <option class="optiones" value="300">Si</option>
                      <option class="optiones" value="0">No</option>
                      <option class="optiones" value="150"> No sé</option>
                </select>
                <p class="labeli">La Web necesita un directorio/buscador interno:</p>
                     <select class="select-cotiza" id="buscador_directorio" name="buscador_directorio">
                      <option>Selecciona</option>
                      <option class="optiones" value="200">Si</option>
                      <option class="optiones" value="0">No</option>
                      <option class="optiones" value="100"> No sé</option>
                </select>
                </div>
                   <!--<p style="margin:0; padding: 0">Valor €</p> --><div id="monto_euro"><span>€</span></div>
                   <!-- <p style="margin:0; padding: 0">Valor $</p>--><div id="monto_peso"><span>$</span></div>
                   <input class="input-form" type="submit" value="Enviar cotizacion" name="enviar">
                   <div id="info"><span></span></div>
	 	</form>
	 </div>
 </div> 
<div class="containerapp-answer">
 <a href="formreportes.php" style="float: right; color:#5CBA73 ; margin-right: 20px;">Reportes</a>
<h2 class="title-log">Datos clientes</h2>
	<section class="app-preguntas">
	<form action="#" method="POST">
	   <div class="input-row-one">
	   	<input class="row-one " type="text" name="nombre" placeholder="Atencion" required>
	  	<input class="row-one " type="text" name="telefono" placeholder="Telefono" required>
	  	<input class="row-one " type="text" name="identificacion" placeholder="Identificacion" required>
	  	<input id="input-email" type="email" name="email" placeholder="Correo Electronico" required>
	   </div>
	    <input class="input-form" type="submit" value="Enviar"
	      name="submit">
	      <input class="input-form"  type="button" value="Cotizar"
	      name="submit">    
	  </div>
	  </form> 	
	</section>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="alertifyjs/alertify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script type="text/javascript">
   
	$(document).ready(function carga() {
		var val0 = $('#tipowe');
		var val1 = $('#diseño');
		var val2= $('#web_pagos');
		var val3= $('#integracion_app');
		var val4= $('#multidioma');
		var val5= $('#registro_usuarios');
		var val6= $('#buscador_directorio');
  
		aler();
        var $modal=$(".app-container-cotizacion");
          $('input[type=button]').on("click",function() {
        	$(".app-container-cotizacion").slideDown("slow");
        })
      $('.close-modal').on("click",function() {
      	closemodal($modal);
      })
      CalcularMonto();   //llamando funciones
      enviarCotizacion();
//Funcion para el monto de cada select 
function CalcularMonto() { 
	var selects= $('.select-cotiza').find('.optiones'); //seleccionamos los option
       //alert(selects.eq(3).val()); //objetos selepcionado
	var $span_euro=$('#monto_euro').find('span');
	var $span_peso=$('#monto_peso').find('span');
	var acum=0,acun_euros=0;
	var array_valores=[];
	var i=0; 
	var euro_actual=3.521;  //valor del euro actual
	var valor_e;

   
	 $('.optiones').on("click",function() {
	    array_valores[0] = val0.val();
		array_valores[1] = val1.val();
		array_valores[2] = val2.val();
		array_valores[3] = val3.val();
		array_valores[4] = val4.val();
		array_valores[5] = val5.val(); 
		array_valores[6] = val6.val();

        var valor_p = array_valores[i];
         acum+=eval(valor_p); //vamos calculando los precios en euros
         var valor=currency(acum,3, [',', "'", '.']);
         $span_euro.html(valor+"€"); 

         var valor_convertir= valor_p;  //vamos calculando los precios en pesos
          valor_e=valor_convertir*euro_actual;
          acun_euros+=eval(valor_e);
          var valor2=currency(acun_euros,3, [',', "'", '.']);
          $span_peso.html("$"+valor2);
          console.log(array_valores);
         i++;
	})	 
}

$('.select-cotiza').find('#tipoweb').on("click",function (argument) {
	var valortipoweb = $("#tipoweb").val();
		alert(valortipoweb);
})

	}) //fin del jquery

//funciones modal y starSesion
 function aler(argument) {
 	alertify.success("Form Cotizacion");
 }

function closemodal($modal) {
	$modal.slideUp("slow");
}

/**
 * Description 
 * @return type
 * @Description Method AjAX para enviar datos cotizados
 *  @author Dan5erv3r
 */
function enviarCotizacion() {
  var mensaje=$('#info').find('span');
  var input=$('#form').find('#tipoweb');
	$('#form').on("submit",function(ev) {
		ev.preventDefault(); //evita que la pagina se  autorecargue 
     var cotizacion=$(this).serializeArray(); 
        var precio_euro=$('#monto_euro').text(); //capturamos los precios del form
          cotizacion.push({ name: "precio_euro", value: precio_euro});
       $.ajax({
        "method": "POST",
        "url": "php/server.php",
        "data": cotizacion
        }).done(function (response){ //respuesta [response] del servidor
        if(response== "false"){
        alertify.error("Campos no llenados","Error");
        } else {
          var $modal=$(".app-container-cotizacion");
          closemodal($modal);
          alertify.success("Web Cotizada");
        }
       });  
	});
}

  /**
   * Description Metodo para conversion de monedas
   * @param type value 
       @author Luis Gadarow (Ranspod.com)
   * @param type decimals 
   * @param type separators 
   * @return type
   */
function currency(value, decimals, separators) {  //funcion para conversion de numeros en JS
    decimals = decimals >= 0 ? parseInt(decimals, 0) : 2;
    separators = separators || ['.', "'", ','];
    var number = (parseFloat(value) || 0).toFixed(decimals);
    if (number.length <= (4 + decimals))
        return number.replace('.', separators[separators.length - 1]);
    var parts = number.split(/[-.]/);
    value = parts[parts.length > 1 ? parts.length - 2 : 0];
    var result = value.substr(value.length - 3, 3) + (parts.length > 1 ?
        separators[separators.length - 1] + parts[parts.length - 1] : '');
    var start = value.length - 6;
    var idx = 0;
    while (start > -3) {
        result = (start > 0 ? value.substr(start, 3) : value.substr(0, 3 + start))
            + separators[idx] + result;
        idx = (++idx) % 2;
        start -= 3;
    }
    return (parts.length == 3 ? '-' : '') + result;
}

</script>
</body>
</html>