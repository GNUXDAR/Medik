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
    $buscarCitas="SELECT * FROM cita_cnslt WHERE fecha_cita='$date'";
	$conectando = new Conection();

	$listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
?>
  <div class="content">
        <div id="pad-wrapper" class="form-page"> 
        <h3>Listas de citas</h3>
        <div class="row">
            <div class="col col-md-6">
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
            <div class="col col-md-6">
                <samp class="btn btn-primary" id="buscarCita">Buscar</samp>
            </div>
                            
                                    

                                                    
        </div>
        <table class="table" id="table_citas">
            <tr>
                <th>Fecha Cita</th>
                <th>Motivo</th>
                <th>Acompañante</th>
                <th></th>
            </tr>

<?php	if( pg_num_rows($listaCitas) > 0 ){

        $resul = pg_fetch_all($listaCitas);
            foreach ( $resul as $value) {
?>
                <tr>
                    <td><?php echo $value['fecha_cita']; ?></td>
                    <td><?php echo $value['motivo_cita']; ?></td>
                    <td><?php echo $value['acmp_cita']; ?></td>
                    <td><?php echo $value['id_cita']; ?></td>
                </tr>   
<?php   
            }
    }else{ ?>
        <tr>    
            <td>no hay</td>
            <td>no hay</td>
            <td>no hay</td>
            <td>no hay</td>
        </tr>
<?php    }
	


?> 
        </table>
</div>
</div>

<script type="text/javascript">
    $("#buscarCita").click(function(e) {
        if ( $("#fecha_cita").val() =="" ) {
            alert("El campo fecha no debe estar vacio!.");
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
                                 $("#table_citas").html(data);
                            }
                           
                        }
                });
        }
          
    });

</script>