<?php  //modulo de session
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    }
    include_once('../control/conexion.php');
    include_once('sidebar.php');
    include_once('script.php');
    $date = date('Y-m-d');
    ini_set('display_errors', 'on');  //muestra los errores de php
    $buscarCitas="SELECT * FROM  pacnt_cnslt";
	$conectando = new Conection();
    $i = 1;
	$listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
?>
  <div class="content">
        <div id="pad-wrapper" class="form-page"> 
        <h3>Listas de pacientes</h3><br>
        <div class="row">
         <table class="table" id="table_citas">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>apel_pacnt</th>
                <th>Cedula</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody id="tbody">

<?php	if( pg_num_rows($listaCitas) > 0 ){

        $resul = pg_fetch_all($listaCitas);
            foreach ( $resul as $value) {
?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value['nom_pacnt']; ?></td>
                    <td><?php echo $value['apel_pacnt']; ?></td>
                    <td><?php echo $value['ci_pacnt']; ?></td>
                    <td><?php echo $value['mail_pacnt']; ?></td>
                </tr>   
<?php   
            }
    }else{ ?>
        <tr>    
            <td colspan="4">No hay Registros</td>
        </tr>
<?php    }
	


?> 
        </tbody>
        </table>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
         $("#table_citas").dataTable();
    });
       


</script>