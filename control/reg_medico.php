<?php 

include_once('conexion.php');
 
ini_set('display_errors', 'on');

$ci_medic		= $_POST['ci_medic'];
$nom_medic		= $_POST['nom_medic'];
$apel_medic		= $_POST['apel_medic'];
$fn_medic		= $_POST['fn_medic'];
$dir_medic		= $_POST['dir_medic'];
$mail_medic		= $_POST['mail_medic'];
$tlf_medic		= $_POST['tlf_medic'];
$espc_medic		= $_POST['espc_medic'];

$comparar="SELECT * FROM medic_cnslt WHERE ci_medic = '$ci_medic'";

$conectando = new Conection();

$verifica = pg_query($conectando->conectar(), $comparar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$localizar=pg_num_rows($verifica);
	if ($localizar==0) {


		$INSERTAR=pg_query($conectando->conectar(), "INSERT INTO medic_cnslt (ci_medic, nom_medic, apel_medic, fn_medic, dir_medic, mail_medic, tlf_medic, espc_medic)
		VALUES ('$ci_medic', '$nom_medic', '$apel_medic', '$fn_medic', '$dir_medic', '$mail_medic', '$tlf_medic', '$espc_medic')");	

		if (!$INSERTAR) { 
		    print ("<script>alert('El medico no pudo ser registrado');</script>");
		    print('<meta http-equiv="refresh" content="0; URL=../vistas/medicos.php">');
		    }

		else { 
		    print ("<script>alert('El medico fue registrado exitosamente');</script>");
		    print('<meta http-equiv="refresh" content="0; URL=../vistas/medicos.php">');
		    }

	}

	else {
	    print ("<script>alert('El medico ya se encuentra registrado');</script>");
	    print('<meta http-equiv="refresh" content="0; URL=../vistas/medicos.php">');
}

?>