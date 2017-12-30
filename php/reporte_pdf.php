<?php 
include('Conexion.php');

/**
 * Description Function generarReporte
 * @since  22/11/2017
 * @author  Dan5erv3r
 * @return type
 */
function generarReporte(){
	require_once("tcpdf/tcpdf.php");
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
 
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Daniel Avila');

	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(10, 10, 10, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

    ConexionDBD::conection();
$con =ConexionDBD::getConexion();

$query="SELECT * FROM usuarios";
$state=$con->prepare($query);
$state->execute();
$DB_query=$state->get_result();

    $content = '';
 
	$content .= '
      <table>
        <thead>
          <tr>
            <th style="padding-bottom=5px">IDENTIFICACION</th>
            <th style="padding-bottom=5px">NOMBRE</th>
            <th style="padding-bottom=5px">TELEFONO</th>
            <th style="padding-bottom=5px">EMAIL</th>
          </tr>
        </thead>
	';

		while ($user=mysqli_fetch_array($DB_query)) { 
			$color= '#f5f5f5';
	$content .= '
		<tr bgcolor="'.$color.'">
            <td>'.$user['identificacion'].'</td>
            <td>'.$user['nombre'].'</td>
            <td>'.$user['telefono'].'</td>
            <td>'.$user['email'].'</td>
        </tr>
	';
	}

	$content .= '</table>';
 
	$content .= '
		<div class="row padding">
        	<div style="text-align:center;">
            	<span>Pdf Creator </span><a href="https://github.com/dan5erv3rdan">By Daniel Avila</a>
            </div>
        </div>
 
	';
		$pdf->writeHTML($content,true, 0, true, 0);
	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

 ?>