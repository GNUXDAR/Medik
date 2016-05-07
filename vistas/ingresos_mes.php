<?php
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
        header("Location: ../index.php");
}
include_once('../control/conexion.php');
include_once('sidebar.php');
include_once('script.php');
$fecha = new DateTime();
$fecha->modify('first day of this month');
$first_day = $fecha->format('Y-m-d');
$fecha->modify('last day of this month');
$last_day = $fecha->format('Y-m-d');
 $i = 1;
 $total = 0;
$sql="SELECT  * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) Where fecha_cita  BETWEEN '$first_day'  AND '$last_day' AND estatus = '1'";
$conectando = new Conection();

$query = pg_query($conectando->conectar(), $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

?>

  <div class="content">
        <div id="pad-wrapper" class="form-page"> 
        <h3>Ingresos del Mes</h3><br>
        <!-- <div class="row">
            <div class="col col-md-6">
                <a href="pdf_asistencia_mes.php" id="pdf_asistencia_mes" class="btn btn-primary" <?php echo (pg_num_rows($query) > 0) ? "" : "disabled" ; ?>>
                    <i class="icon-download-alt" ></i>  Exportar
                </a>
                
            </div>                                                    
        </div><br> --><br>
        <div class="row" id="table_asistencia">
         <table class="table table-condensed table-striped table-hover dataTable" id="table_citas">
            <thead>
            <tr>
                <th>#</th>
                <th>Fecha Cita</th>
                <th>Paciente</th>
                <th>Cedula</th>
                <th>Motivo</th>
                <th>Acompañante</th>
                <th>Ingreso</th> 
            </tr>
            </thead>
            <tbody id="tbody">
<?php
if( pg_num_rows($query) > 0 ){
	$resul = pg_fetch_all($query);
	foreach ($resul as $value) {
?>

	 <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo strftime("%d-%m-%Y",strtotime($value['fecha_cita'])); ?></td>
            <td><?php echo $value['nom_pacnt']; ?> <?php echo $value['apel_pacnt']; ?></td>
            <td><?php echo $value['ci_pacnt']; ?></td>    
            <td><?php echo $value['motivo_cita']; ?></td>
            <td><?php echo $value['acmp_cita']; ?></td>
            <td><?php echo number_format($value['pago_cita'],2,'.',','); $total = $total + $value['pago_cita']; ?></td>
    </tr>  



<?php
	}
}else{
?>
	<!-- <tr>    
            <td colspan="4">No hay Registros</td>
    </tr> -->
<?php	
}

?>
        </tbody>
        <tfoot style="">

						  <tr>
						  	<td>&nbsp;</td>
						  	<td>&nbsp;</td>
						  	<td>&nbsp;</td>
						  	<td>&nbsp;</td>
						  	<td>&nbsp;</td>
						  	<td style="color: #000;background: #ddd;"  ><strong style=" text-align: right;">Ingresos Acumulados</strong></td>
						  	<td style="color: #000000;background: #ddd;"><strong style=" text-align: right;"><?php echo number_format($total,2,'.',','); ?></strong></td>
						  	
						  </tr>
		</tfoot>
        </table>
</div>
</div>

<script type="text/javascript">
	
// $(document).ready(function() {
// 	$("#pdf_asistencia_mes").click(function(e) {
//         e.preventDefault();
//         console.log($("#table_asistencia").html());
//         $.ajax({
//                         url: "pdf_asistencia_mes.php",
//                         type : 'POST',
//                         data: { html : $("#table_asistencia").html() },
//                         success:
//                             function (data) {                                   
                                                              
//                             }
//         });
//     });
// });

</script>