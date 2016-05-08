<?php 
include_once('reportes/Reportes_pdf.php');
ini_set('display_errors', 'on');  //muestra los errores de php
$CONECTAR="host='127.0.0.1' dbname='consulta' user='grebo' password='123'";
$CONEXION=pg_connect($CONECTAR);
$id_paciente = $_GET['id_paciente'];

$sql="SELECT * FROM pacnt_cnslt INNER JOIN cita_cnslt ON cita_cnslt.ci_pacnt_cita =  pacnt_cnslt.ci_pacnt INNER JOIN hist_pacnt ON hist_pacnt.id_cita =  cita_cnslt.id_cita WHERE id_pacnt = $id_paciente";
$query = pg_query($CONEXION, $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
$result=pg_fetch_all($query);

$html= '
							<br><h2 align="center">HISTORIA CLINICA</h2><br>
 							<table id="data" border="1" class="table table" id="table_citas" cellpadding="2" cellspacing="2" >
                                <tbody>
                                    <tr>
                                        <td colspan="4"><strong>Nombres y Apellidos: </strong>'.$result[0]['nom_pacnt'].' '.$result[0]['apel_pacnt'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Edad:</strong>'.CalculaEdad($result[0]['fn_pacnt']).' años</td>
                                        <td><strong>C.I.:</strong> '.$result[0]['ci_pacnt'].'</td>
                                        <td><strong>Sexo:</strong> '.$result[0]['sexo_pacnt'].'</td>
                                        <td><strong>Tlf:</strong> '.$result[0]['cod_tlf_pacnt'].'-'.$result[0]['tlf_pacnt'].'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>Dirección:</strong>'.$result[0]['dir_pacnt'].'</td>
                                    </tr>
                                </tbody>
                            </table>
';

$resul = pg_fetch_all($query);
	foreach ($resul as $value) {
	$html.='
		<br><br>
                                        <table id="data" border="1" class="table table" id="table_citas" cellpadding="2" cellspacing="2" >
                                            <tbody>
                                                <tr>
                                                    <td ><strong>N#H:</strong>'.$value['id_his'].'</td>
                                                    <td colspan="3" ><strong>Fecha:</strong>'.strftime("%d-%m-%Y",strtotime($value['fecha_cita'])).'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" ><strong>Motivo de consulta:</strong>'.$value['motivo_cita'].'</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="4" ><strong>Enfermedad actual:</strong> '.$value['enfermedad_actual'].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="center"><strong>Antecedentes</strong></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" ><strong>Personales:</strong> '.$value['antecedentes_personales'].'</td>
                                                </tr> 
                                                <tr>
                                                    <td colspan="4" ><strong>Quirúrgicos:</strong> '.$value['antecedentes_quirurgicos'].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" ><strong>Familiares:</strong> '.$value['antecedentes_familiares'].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="center"><strong>Hábitos Psicobiológicos</strong></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" > '.$value['habitos'].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" ><strong>Diagnósticos:</strong> '.$value['diagnostico'].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" ><strong>Comentarios:</strong> '.$value['comentarios'].'</td>
                                                </tr>
                                            </tbody>
                                    </table>
	';
}

function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

$pdf= new Reportes_pdf();
$pdf->pdf( $titulo = 'HISTORIA CLINICA', $formato = 'A4' , $orientacion = 'P' , $html, $archivo = 'histori_clinica_'.$result[0]['ci_pacnt']);

?>