<?php 
include_once('conexion.php');
 
ini_set('display_errors', 'on');


$ci_medic		= $_POST['ci_medic'];
$nom_medic		= ucwords($_POST['nom_medic']);
$apel_medic		= ucwords($_POST['apel_medic']);
$fn_medic		= $_POST['fn_medic'];
$dir_medic		= $_POST['dir_medic'];
$mail_medic		= $_POST['mail_medic'];
$tlf_medic		= $_POST['tlf_medic'];
$espc_medic     = $_POST['espc_medic'];
$cod_tlf        = $_POST['cod_tlf'];

$modificar="UPDATE medic_cnslt SET nom_medic = '$nom_medic', apel_medic = '$apel_medic', fn_medic = '$fn_medic', dir_medic = '$dir_medic', mail_medic = '$mail_medic', tlf_medic = '$tlf_medic', espc_medic = '$espc_medic', cod_tlf= '$cod_tlf'  WHERE ci_medic = $ci_medic";

$conectando = new Conection();

$verifica = pg_query($conectando->conectar(), $modificar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$localizar=pg_affected_rows($verifica);
	if ($localizar > 0) {


		print ("<script>alert('Medico Modificado');</script>");
	    print('<meta http-equiv="refresh" content="0; URL=../vistas/index_medicos.php">');

	}

	else {
		print ("<script>alert('Medico No Modificado');</script>");
	    print('<meta http-equiv="refresh" content="0; URL=../vistas/index_medicos.php>');
}

?>