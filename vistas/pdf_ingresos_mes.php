<?php 
include_once('reportes/Reportes_pdf.php');
ini_set('display_errors', 'on');  //muestra los errores de php
$CONECTAR="host='127.0.0.1' dbname='consultorio' user='canaima' password='canaima'";
$CONEXION=pg_connect($CONECTAR);
$i =1;
$total = 0;
$fecha = new DateTime();
$fecha->modify('first day of this month');
$first_day = $fecha->format('Y-m-d');
$fecha->modify('last day of this month');
$last_day = $fecha->format('Y-m-d');




$sql="SELECT  * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) Where fecha_cita  BETWEEN '$first_day'  AND '$last_day' AND estatus = '1'";
$query = pg_query($CONEXION, $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
$result=pg_fetch_all($query);

$html= '
							<br><h3>Ingresos del Mes</h3><br>
 							<table id="data" border="1" class="table table" id="table_citas" cellpadding="2" cellspacing="2" >
                                <thead>
                                <tr>
                                    <th style="background-color: #858689;color: #fff;font-weight: bold;">#</th>
                                    <th style="background-color: #858689;color: #fff;font-weight: bold;">Fecha Cita</th>
                                    <th style="background-color: #858689;color: #fff;font-weight: bold;">Paciente</th>
                                    <th style="background-color: #858689;color: #fff;font-weight: bold;">Cedula</th>
                                    <th style="background-color: #858689;color: #fff;font-weight: bold;">Motivo</th>
                                    <th style="background-color: #858689;color: #fff;font-weight: bold;">Acompañante</th>
                                    <th style="background-color: #858689;color: #fff;font-weight: bold;">Ingreso</th> 
                                </tr>
                                </thead>
                                <tbody>';

$resul = pg_fetch_all($query);
	foreach ($resul as $value) {
	$html.='<tr>
                    <td>'.$i++.'</td>
                    <td>'.strftime("%d-%m-%Y",strtotime($value['fecha_cita'])).'</td>
                    <td>'.$value['nom_pacnt'].' '.$value['apel_pacnt'].'</td>
                    <td>'.$value['ci_pacnt'].'</td>    
                    <td>'.$value['motivo_cita'].'</td>
                    <td>'.$value['acmp_cita'].'</td>
                    <td>'.number_format($value['pago_cita'],2,'.',',').'</td>
            </tr>  ';
    $total = $total + $value['pago_cita'];
}
$html.='</tbody>
        <tfoot>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="color: #000;background-color: #ddd;"  ><strong style=" text-align: right;">Ingresos Acumulados</strong></td>
                    <td style="color: #000000;background-color: #ddd;"><strong style=" text-align: right;">'.number_format($total,2,'.',',').'</strong></td>
                            
                </tr>
        </tfoot>
        </table>';
$pdf= new Reportes_pdf();
$pdf->pdf( $titulo = 'Ingresos del Mes', $formato = 'A4' , $orientacion = 'P' , $html, $archivo = 'ingresos_mes');

?>
