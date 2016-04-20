<?php
$reporte = $_POST['reporte'];
ini_set('display_errors', 'on');  //muestra los errores de php
include_once('../control/conexion.php');
include "libchart/classes/libchart.php";
$conectando = new Conection();
$sql = "";
$nombreImagen = ""; 
$title = "";

$chart = new PieChart(500, 500);
$dataSet = new XYDataSet();

switch ($reporte) {
	case 1: #reporte por edad
		
		$sql="SELECT  count(pacnt_cnslt.fn_pacnt) as count_edad , pacnt_cnslt.fn_pacnt FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) group by fn_pacnt";
		$result = result($sql);
		foreach ($result as $value) {
			$dataSet->addPoint(new Point( CalculaEdad( $value['fn_pacnt'] ). ' Años ('.$value['count_edad'].')' , $value['count_edad']));
		}
		$nombreImagen = 'repote_edad';
		$title = "Reporte de Pacientes por Edades";
		break;

	case 2:
		echo "es dos"; 
		break;

	case 3: #reporte por enfermedad
		
		$sql="SELECT  count(cita_cnslt.motivo_cita) as count_motivo_cita, cita_cnslt.motivo_cita FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) group by motivo_cita";
		$result = result($sql);
		foreach ($result as $value) {
			$dataSet->addPoint(new Point( $value['motivo_cita'].' ('.$value['count_motivo_cita'].')' , $value['count_motivo_cita']));
		}
		$nombreImagen = 'repote_enfermedades';
		$title = "Reporte de Pacientes por Enfermedades";
		break;

	case 4:
		echo "es catro"; 
		break;

	case 5:
		echo "es cinco"; 
		break;

	default:
		echo(0);
		break;
}


function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

function result($sql='')
{
	$conectando = new Conection();
	$reporte_query = pg_query($conectando->conectar(), $sql) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
	return pg_fetch_all($reporte_query);
}




	$chart->setDataSet($dataSet);

	$chart->setTitle($title);
	$chart->render("img/reportes/".$nombreImagen.".png");

	if( file_exists("img/reportes/".$nombreImagen.".png") ){
			echo '<img  src="img/reportes/'.$nombreImagen.'.png">';
	}else{
			echo(0);
	}