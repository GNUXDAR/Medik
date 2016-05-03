<?php
$reporte = $_POST['reporte'];
ini_set('display_errors', 'on');  //muestra los errores de php
include_once('../control/conexion.php');
include "libchart/classes/libchart.php";
$conectando = new Conection();
$sql = "";
$nombreImagen = ""; 
$title = "";

if ($reporte == 4 or $reporte == 5) {
	$chart = new VerticalBarChart(250, 500);
}else{
	$chart = new PieChart(500, 500);
}

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
		$sql="SELECT  count(pacnt_cnslt.sexo_pacnt) as count_sexo_pacnt, pacnt_cnslt.sexo_pacnt FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) group by pacnt_cnslt.sexo_pacnt";
		$result = result($sql);
		foreach ($result as $value) {
			$dataSet->addPoint(new Point( $value['sexo_pacnt'].' ('.$value['count_sexo_pacnt'].')' , $value['count_sexo_pacnt']));
		}
		$nombreImagen = 'repote_sexo';
		$title = "Reporte de Pacientes por Sexo";
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
		$sql="SELECT  count(cita_cnslt.motivo_cita) as count_total_mes FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) Where fecha_cita  BETWEEN '2016-04-01'  AND '2016-04-30'";
		$result = result($sql);
		foreach ($result as $value) {
			$dataSet->addPoint(new Point( date('M').' ('.$value['count_total_mes'].')' , $value['count_total_mes']));
		}
		$nombreImagen = 'repote_mes';
		$title = "Reporte de pacientes por Asisten al mes";
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
			echo '<img  src="img/reportes/'.$nombreImagen.'.png"><br>';
			echo '<a href="reporte_pdf.php?nombre_archivo='.$nombreImagen.'&titulo_grafica='.$title.'" class="btn btn-primary" onclick="descargar_pdf();">Descargar</a>';
	}else{
			echo(0);
	}



	// if ($("#select_reporte").val() == 1) {
	// 			titilu_grafica = "Reporte de pacientes por Edades";
	// 			nombre_archivo = "reporte de pacientes por edades";
	// 	}
 //        if ($("#select_reporte").val() == 2) {
 //                titilu_grafica = "Reporte de pacientes por Sexo";
 //                nombre_archivo = "reporte de pacientes por sexo";
 //        }
 //        if ($("#select_reporte").val() == 3) {
 //                titilu_grafica = "Reporte de pacientes por Enfermedad";
 //                nombre_archivo = "reporte de pacientes por enfermedad";
 //        }
 //        if ($("#select_reporte").val() == 4) {
 //                titilu_grafica = "Reporte de pacientes por Asisten al mes";
 //                nombre_archivo = "reporte de pacientes por asisten al mes";
 //        }