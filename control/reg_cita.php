<?php 

include_once('conexion.php');
 
ini_set('display_errors', 'on');


$ci_pacnt_cita	  = $_POST['ci_pacnt'];
$fecha_cita		  = $_POST['fecha_cita'];
$motivo_cita	  = $_POST['motivo_cita'];
$acmp_cita		  = $_POST['acmp_cita'];
$observacion_cita = $_POST['observacion_cita'];

$conectando = new Conection();
$sql="SELECT * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) WHERE fecha_cita = '$fecha_cita' AND ci_pacnt_cita = '$ci_pacnt_cita'";
$query = pg_query($conectando->conectar(), $sql) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
if (pg_num_rows($query) > 0) {
		print ("<script>alert('El Paciente ya tiene una cita con esa fecha ".$fecha_cita." intente con otra');</script>");
		print('<meta http-equiv="refresh" content="0; URL=../vistas/citas.php">');
}else{
	$INSERTAR=pg_query($conectando->conectar(), "INSERT INTO cita_cnslt (ci_pacnt_cita, fecha_cita, motivo_cita, acmp_cita, estatus,observacion_cita)
		VALUES ('$ci_pacnt_cita', '$fecha_cita', '$motivo_cita', '$acmp_cita', '0','$observacion_cita')");	

		if (!$INSERTAR) { 
		    print ("<script>alert('La cita no pudo ser registrada');</script>");
		    print('<meta http-equiv="refresh" content="0; URL=../vistas/citas.php">');
		    }

		else { 
		    print ("<script>alert('La cita fue registrada exitosamente');</script>");
		    print('<meta http-equiv="refresh" content="0; URL=../vistas/listas_citas.php">');
		    }
}

?>