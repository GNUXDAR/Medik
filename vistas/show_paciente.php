<?php
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: ../index.php");
}
include_once('../control/conexion.php');
include_once('sidebar.php');
include_once('script.php');
$id_pacnt = $_GET['id_paciente'];
 ini_set('display_errors', 'on');  //muestra los errores de php
    $buscarCitas="SELECT * FROM  pacnt_cnslt WHERE id_pacnt='$id_pacnt'";
	$conectando = new Conection();
    $i = 1;
	$listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
	$paciente = pg_fetch_array($listaCitas);
?>
<div class="content">
        <div id="pad-wrapper" class="form-page"> 
        		<h3>Datos del Paciente</h3><br>
        		<a href="pacientes_shows.php" class="btn btn-default"><i class="icon-arrow-left"></i> Regresar</a><br><br>
				<table class="table table-striped" id="documentacion">
				    <tbody>
				        <tr>
				            <td><strong>Nombre:</strong></td>
				            <td colspan="5"><?php echo $paciente['nom_pacnt']; ?> <?php echo $paciente['apel_pacnt']; ?></td>
				        </tr>

				        <tr>
				            
				            <td><strong>Cedula:</strong></td>
				            <td><?php echo $paciente['ci_pacnt']; ?></td>
				            <td><strong>Fecha de Nacimiento:</strong></td>
				            <td><?php echo $paciente['fn_pacnt']; ?></td>
				        </tr>

				        <tr>
				            <td><strong>Correo:</strong></td>
				            <td colspan="5"><?php echo $paciente['mail_pacnt']; ?></td>
				        </tr>

				        <tr>
				            <td><strong>Direccción:</strong></td>
				            <td colspan="5"><?php echo $paciente['dir_pacnt']; ?></td>
				        </tr>

				        <tr>
				            <td><strong>Telefono:</strong></td>
				            <td><?php echo $paciente['tlf_pacnt']; ?></td>
				            <td><strong>Sexo:</strong></td>
				            <td colspan="3"><?php echo $paciente['sexo_pacnt']; ?></td>
				        </tr>

				            </tbody>
				</table>
		</div>
</div>