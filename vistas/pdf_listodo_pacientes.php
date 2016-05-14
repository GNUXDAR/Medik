<?php 
include_once('reportes/Reportes_pdf.php');
ini_set('display_errors', 'on');  //muestra los errores de php
$CONECTAR="host='127.0.0.1' dbname='consultorio' user='canaima' password='canaima'";
$CONEXION=pg_connect($CONECTAR);
$sql="SELECT * FROM  pacnt_cnslt";
$query = pg_query($CONEXION, $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());


$html= '
<h3 align="center">Listado de Pacientes</h3><br>
 <table id="data" border="1" class="table table" id="table_citas" cellpadding="2" cellspacing="2" >
            <thead>
            <tr>
                <th style="background-color: #858689;color: #fff;font-weight: bold;">Nombre</th>              
                <th style="background-color: #858689;color: #fff;font-weight: bold;">Cedula</th>
                <th style="background-color: #858689;color: #fff;font-weight: bold;">Telefono</th>
                <th style="background-color: #858689;color: #fff;font-weight: bold;">Correo</th>
                <th style="background-color: #858689;color: #fff;font-weight: bold;">Fecha de Nacimiento</th>
            </tr>
            </thead>
            <tbody id="tbody">
';

$resul = pg_fetch_all($query);
	foreach ($resul as $value) {
	$html.='
		<tr>
	            <td>'.$value['nom_pacnt'].' '.$value['apel_pacnt'].'</td>
	            <td>'.$value['ci_pacnt'].'</td>    
	            <td>'.$value['cod_tlf_pacnt'].'-'.$value['tlf_pacnt'].'</td>
	            <td>'.$value['mail_pacnt'].'</td>
	            <td>'.strftime("%d-%m-%Y",strtotime($value['fn_pacnt']) ).'</td> 
	            
	    </tr>
	';
}
$html.='
		</tbody>
        </table>
';
;
$pdf= new Reportes_pdf();
$pdf->pdf( $titulo = 'Lisdato de Pacientes', $formato = 'A4' , $orientacion = 'P' , $html, $archivo = 'lisdato_pacientes');

?>