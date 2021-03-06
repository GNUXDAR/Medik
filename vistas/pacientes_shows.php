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
            <div class="col col-md-6">
                <a href="pacientes.php" class="btn btn-primary">
                    <i class="icon-plus-sign" ></i>  Registrar Paciente
                </a>
                
            </div>                                                    
        </div><br><br>
        <div class="row">
         <table class="table table-condensed table-striped table-hover dataTable" id="table_citas">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
               
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody id="tbody">

<?php	if( pg_num_rows($listaCitas) > 0 ){

        $resul = pg_fetch_all($listaCitas);
            foreach ( $resul as $value) {
?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value['nom_pacnt']; ?> <?php echo $value['apel_pacnt']; ?></td>
                   
                    <td><?php echo $value['ci_pacnt']; ?></td>
                    <td><?php echo $value['cod_tlf_pacnt'].'-'. $value['tlf_pacnt']; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="show_paciente.php?id_paciente=<?php echo $value['id_pacnt'];?>" class="btn btn-info" title="Ver"><i class="icon-eye-open"></i></a>
                            <a href="edit_paciente.php?id_paciente=<?php echo $value['id_pacnt'];?>" class="btn btn-primary" title="Modificar"><i class="icon-pencil"></i></a>
                            <a href="hist.php?id_paciente=<?php echo $value['id_pacnt'];?>" class="btn btn-success"  title="Historia"><i class="icon-list-alt"></i></a>
                            <!-- <a href="../control/delete_paciente.php?id_paciente=<?php echo $value['id_pacnt'];?>" class="btn btn-danger" title="Eliminar" onclick="if(confirm('&iquest;Esta seguro que desea Eliminar al paciente?')) return true;  else return false;"><i class="icon-trash"></i></a> -->
                        </div>
                    </td>
                </tr>   
<?php   
            }
    }else{ ?>
        
<?php    }
	


?> 
        </tbody>
        </table>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        
    });
       


</script>