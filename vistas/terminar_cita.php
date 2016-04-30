<?php 
include_once('../control/conexion.php');
 
ini_set('display_errors', 'on');

$id_cita = $_GET['id_cita'];

$sql="UPDATE cita_cnslt SET pago_cita = 5000, estatus = '1'  WHERE id_cita = $id_cita";

$conectando = new Conection();

$query = pg_query($conectando->conectar(), $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

	if (pg_affected_rows($query) > 0) {

		print ("<script>alert('Cita Terminada');</script>");
	    print('<meta http-equiv="refresh" content="0; URL=../vistas/listas_citas.php">');

	}

	else {
		print ("<script>alert('Cita no Terminada');</script>");
	    print('<meta http-equiv="refresh" content="0; URL=../vistas/listas_citas.php>');
}

?>