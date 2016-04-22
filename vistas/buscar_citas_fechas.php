<?php

$fecha = $_POST['fecha'];

include_once('../control/conexion.php');
$buscarCitas="SELECT * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) WHERE fecha_cita = '$fecha'";
$conectando = new Conection();

$listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
$resul = pg_fetch_all($listaCitas);
$table ='';
if ($resul) {
	foreach ($resul as  $cita) {
			$table.= '<tr>';
				$table.='<td>'. $cita["fecha_cita"] .'</td>';
				$table.='<td>'. $cita["nom_pacnt"] .' '. $cita["apel_pacnt"] .'</td>';
				$table.='<td>'. $cita["ci_pacnt"] .'</td>';
				$table.='<td>'. $cita["motivo_cita"] .'</td>';
				$table.='<td>'. $cita["acmp_cita"] .'</td>';
				$table.='<td><div class="btn-group btn-group-sm"><a href="show_citas.php?id_cita='.$cita["id_cita"].'" class="btn btn-info" title="Ver"><i class="icon-eye-open"></i></a></div></td>';
			$table.= '</tr>';

	}
	
	echo $table;
}else{
	echo json_encode(0);
}



