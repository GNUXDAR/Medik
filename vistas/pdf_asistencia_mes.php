<?php 
include_once('reportes/Reportes_pdf.php');
ini_set('display_errors', 'on');
$CONECTAR="host='127.0.0.1' dbname='consulta' user='grebo' password='123'";
$CONEXION=pg_connect($CONECTAR);
$fecha = new DateTime();
$fecha->modify('first day of this month');
$first_day = $fecha->format('Y-m-d');
$fecha->modify('last day of this month');
$last_day = $fecha->format('Y-m-d');
$i = 1;
$sql="SELECT  * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) Where fecha_cita  BETWEEN '$first_day'  AND '$last_day'";
$query = pg_query($CONEXION, $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$html= '
<h3 align="center">Asistencia del Mes</h3><br>
 <table id="data" border="1" class="table table-condensed table-striped table-hover dataTable" id="table_citas">
            <thead>
            <tr>
                <th>#</th>
                <th>Fecha Cita</th>
                <th>Paciente</th>
                <th>Cedula</th>
                <th>Motivo</th>
                <th>Acompañante</th>  
            </tr>
            </thead>
            <tbody id="tbody">
';

$resul = pg_fetch_all($query);
	foreach ($resul as $value) {
	$html.='
		<tr>
	            <td>'.$i++.'</td>
	            <td>'.$value['fecha_cita'].'</td>
	            <td>'.$value['nom_pacnt'].' '.$value['apel_pacnt'].'</td>
	            <td>'.$value['ci_pacnt'].'</td>    
	            <td>'.$value['motivo_cita'].'</td>
	            <td>'.$value['acmp_cita'].'</td>
	    </tr>
	';
}
$html.='
		</tbody>
        </table>
';
// var_dump($html);
// die();
$pdf= new Reportes_pdf();
$pdf->pdf( $titulo = 'Reporte de Asistencia del mes', $formato = 'A4' , $orientacion = 'P' , $html, $archivo = 'reporte_asistencia_mes');

?>