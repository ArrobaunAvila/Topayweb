<?php 

include('php/reporte_pdf.php');

ConexionDBD::conection();
$con =ConexionDBD::getConexion();

$query="SELECT * FROM usuarios";
$state=$con->prepare($query);
$state->execute();
$DB_query=$state->get_result();

if(isset($_POST['generar_reporte'])){
generarReporte();
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
    height: 900px;
}
</style>
<body>
<?php include('php/header.php');?>
<div class="containerapp-reportes">
 <a href="php/logout.php" style="float: right; color:#5CBA73 ; margin-right: 20px;">CerrarSesion</a>
<h2 class="title-log">Usuarios Cotizadores</h2>
	<section class="app-reportes"> 	
		<table class="table_cotizadores">
			<thead>
				<tr>
				    <th>Identificacion</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Email</th>
				</tr>
			</thead>
     		<tbody>
			     <?php 
                  while ($user=ConexionDBD::iterarQuery($DB_query)){
                    echo "<tr>";
                    echo "<td>";
                    echo $user['identificacion'];
                    echo "</td>";
                    echo "<td>";
                    echo $user['nombre'];
                    echo "</td>";
                    echo "<td>";
                    echo $user['telefono'];
                    echo "</td>";
                     echo "<td>";
                    echo $user['email'];
                    echo "</td>";
                    echo "</tr>";
                   }
			     
			     ?>
			</tbody>
		</table>
		<form method="POST" action="#">
		<input class="input-form" type="submit" value="Obtener PDF" name="generar_reporte">
		</form>
	</section>
</div>
<blockquote>
  <p><em>Usuarios Cotizantes.</em></p>
</blockquote>
</body>
</html>