<?php

$fecha = $_POST['fecha'];

include_once('../control/conexion.php');
$buscarCitas="SELECT * FROM cita_cnslt WHERE fecha_cita='$fecha'";
$conectando = new Conection();

$listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
$resul = pg_fetch_all($listaCitas);
$table ='';
if ($resul) {
	foreach ($resul as  $cita) {
			$table.= '<tr>';
				$table.='<td>'. $cita["fecha_cita"] .'</td>';
				$table.='<td>'. $cita["motivo_cita"] .'</td>';
				$table.='<td>'. $cita["acmp_cita"] .'</td>';
				$table.='<td>'. $cita["id_cita"] .'</td>';
			$table.= '</tr>';

	}
	
	echo $table;
}else{
	echo json_encode(0);
}



