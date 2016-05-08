<?php 
include_once('../control/conexion.php');
include_once('../config/config.php');


$id_cita                  = $_POST['id_cita'];
$ci_pacnt                 = $_POST['ci_pacnt'];
$enfermedad_actual        = $_POST['enfermedad_actual'];
$diagnostico              = $_POST['diagnostico'];
$comentarios              = $_POST['comentarios'];
$antecedentes_personales  = $_POST['antecedentes_personales'];
$antecedentes_quirurgicos = $_POST['antecedentes_quirurgicos'];
$antecedentes_familiares  = $_POST['antecedentes_familiares'];
$habitos                  = $_POST['habitos'];

$precio = PRECIO_CITA;
$sql="UPDATE cita_cnslt SET pago_cita = $precio, estatus = '1'  WHERE id_cita = $id_cita";

$conectando = new Conection();

$query = pg_query($conectando->conectar(), $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

	if (pg_affected_rows($query) > 0) {

		$INSERTAR=pg_query($conectando->conectar(), "INSERT INTO hist_pacnt (enfermedad_actual, diagnostico, comentarios, antecedentes_personales, antecedentes_quirurgicos, antecedentes_familiares, habitos, id_cita, ci_pacnt_hist)
		VALUES ('$enfermedad_actual', '$diagnostico', '$comentarios', '$antecedentes_personales', '$antecedentes_quirurgicos', '$antecedentes_familiares', '$habitos', $id_cita, $ci_pacnt)");	

		if (!$INSERTAR) { 
		    print ("<script>alert('Hocurrio un error al Procesar la Operación');</script>");
	    	print('<meta http-equiv="refresh" content="0; URL=../vistas/listas_citas.php">');
		    }

		else { 
		    print ("<script>alert('Cita Terminada');</script>");
	    	print('<meta http-equiv="refresh" content="0; URL=../vistas/listas_citas.php">');
		    }		

	}else {
		print ("<script>alert('Cita no Terminada');</script>");
	    print('<meta http-equiv="refresh" content="0; URL=../vistas/listas_citas.php>');
	}

?>