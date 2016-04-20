<?php 

include_once('conexion.php');
 
ini_set('display_errors', 'on');


$ci_pacnt_cita	= $_POST['ci_pacnt_cita'];
$fecha_cita		= $_POST['fecha_cita'];
$motivo_cita	= $_POST['motivo_cita'];
$acmp_cita		= $_POST['acmp_cita'];

$comparar="SELECT * FROM cita_cnslt WHERE ci_pacnt_cita = '$ci_pacnt_cita'";

$conectando = new Conection();

$verifica = pg_query($conectando->conectar(), $comparar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$localizar=pg_num_rows($verifica);
	if ($localizar==0) {


		$INSERTAR=pg_query($conectando->conectar(), "INSERT INTO cita_cnslt (ci_pacnt_cita, fecha_cita, motivo_cita, acmp_cita)
		VALUES ('$ci_pacnt_cita', '$fecha_cita', '$motivo_cita', '$acmp_cita')");	

		if (!$INSERTAR) { 
		    print ("<script>alert('La cita no pudo ser registrada');</script>");
		    print('<meta http-equiv="refresh" content="0; URL=../vistas/citas.php">');
		    }

		else { 
		    print ("<script>alert('La cita fue registrada exitosamente');</script>");
		    print('<meta http-equiv="refresh" content="0; URL=../vistas/citas.php">');
		    }

	}

	else {	//si hay citas igual registar, un paciente puede tener muchas citas
		$INSERTAR=pg_query($conectando->conectar(), "INSERT INTO cita_cnslt (ci_pacnt_cita, fecha_cita, motivo_cita, acmp_cita)
		VALUES ('$ci_pacnt_cita', '$fecha_cita', '$motivo_cita', '$acmp_cita')");	
	    print ("<script>alert('Se registro una nueva cita');</script>");
	    print('<meta http-equiv="refresh" content="0; URL=../vistas/citas.php">');
}

?>