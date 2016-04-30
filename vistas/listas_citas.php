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
    $buscarCitas="SELECT * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) WHERE fecha_cita='$date'";
	$conectando = new Conection();

	$listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
?>
  <div class="content">
        <div id="pad-wrapper" class="form-page"> 
        <h3>Listas de citas</h3><br>
        <div class="row">
            <div class="col col-md-6">
                <a href="citas.php" class="btn btn-primary">
                    <i class="icon-plus" ></i>  Registrar Cita
                </a>
                
            </div>                                                    
        </div><br><br>
        <div class="row">
            <div class="col col-md-4">
                <label>Fecha:</label>
                           
                                <input name="fecha_cita" id="fecha_cita" class="form-control" type="text" placeholder="Click Aqui" required type="text">

                                        <script type="text/javascript">
                                         
                                          Calendar.setup(
                                            {
                                          inputField : "fecha_cita",
                                          ifFormat   : "%Y-%m-%d",
                                          //button     : "Image1"
                                            }
                                          );
                                          
                                        </script>
            </div>
            <div class="col col-md-4">
                <label for=""></label><br>
                <input type="button" class="btn btn-primary" id="buscarCita" value="Buscar">
            </div>
                            
                                    

                                                    
        </div>
        <br>
        <table class="table table-condensed table-striped table-hover dataTable" id="table_citas">
            <thead>
            <tr>
                <th>Fecha Cita</th>
                <th>Estado</th>
                <th>Paciente</th>
                <th>Cedula</th>
                <th>Motivo</th>
                <th>Acompañante</th>                
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody id="tbody">

<?php	if( pg_num_rows($listaCitas) > 0 ){

        $resul = pg_fetch_all($listaCitas);
            foreach ( $resul as $value) {
?>
                <tr>
                    <td><?php echo $value['fecha_cita']; ?></td>
                    <td>
                            <?php
                                if ($value['estatus'] == 0) {
                                    echo "<span class='label label-default'>En Espera</span>";
                                }else{
                                    echo "<span class='label label-success'>Realizada</span>";
                                }
                            ?>
                    </td>
                    <td><?php echo $value['nom_pacnt']; ?> <?php echo $value['apel_pacnt']; ?></td>
                    <td><?php echo $value['ci_pacnt']; ?></td>
                    <td><?php echo $value['motivo_cita']; ?></td>
                    <td><?php echo $value['acmp_cita']; ?></td>                    
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="show_citas.php?id_cita=<?php echo $value['id_cita']; ?>" class="btn btn-info ver_cita" data-id="<?php echo $value['id_cita']; ?>"  data-title= "<?php echo $value['nom_pacnt']; ?> <?php echo $value['apel_pacnt']; ?>" title="Ver"><i class="icon-eye-open"></i></a>
                            <?php if ($value['estatus'] == 0) {
                               
                            ?>
                            <a href="edit_cita.php?id_cita=<?php echo $value['id_cita']; ?>" class="btn btn-primary" title="Modificar"><i class="icon-pencil"></i></a>
                            <a href="terminar_cita.php?id_cita=<?php echo $value['id_cita']; ?>" class="btn btn-success"  title="Verificar" onclick="if(confirm('&iquest;Esta seguro que desea Terminar la Cita?')) return true;  else return false;"><i class="icon-check"></i></a>
                            <!-- <a href="#" class="btn btn-default" title="Mover"><i class="icon-forward"></i></a> -->
                            <a href="../control/elim_cita.php?id_cita=<?php echo $value['id_cita']; ?>" class="btn btn-danger"  title="Cancelar" onclick="if(confirm('&iquest;Esta seguro que desea Cancelar la Cita?')) return true;  else return false;"><i class="icon-remove"></i></a>
                            <?php } ?>
                        </div>
                    </td>
                </tr>   
<?php   
            }
    }else{ ?>
        <tr>    
            <td colspan="6">No hay Registros</td>
        </tr>
<?php    }
	
include_once('modal.php');

?> 
        </tbody>
        </table>
</div>
</div>

<script type="text/javascript">
    $("#buscarCita").click(function(e) {
        if ( $("#fecha_cita").val() =="" ) {
            alert("El campo fecha no debe estar vaico!.");
            $("#fecha_cita").focus();
        }else{
                $.ajax({
                    url: "buscar_citas_fechas.php",
                    type : 'POST',
                    data: { fecha : $("#fecha_cita").val() },
                    success:
                        function (data) {
                            if (data == 0) {
                                alert("No se encuentran Citas para esa Fecha!.");
                            }else{
                                 $("#tbody").html(data);
                                 $(".ver_cita").click(function(e) {
                                        e.preventDefault();
                                        $("#modal_cita").modal();
                                        $("#title_cita").text($(this).data('title'));
                                        $("#id_cita").val( $(this).data('id') );
                                 });
                            }
                           
                        }
                });
        }
        


        
    });

$(".ver_cita").click(function(e) {
    e.preventDefault();
    $("#modal_cita").modal();
    $("#title_cita").text($(this).data('title'));
    $("#id_cita").val( $(this).data('id') );
});

</script>