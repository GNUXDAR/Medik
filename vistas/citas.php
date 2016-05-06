<?php  //modulo de session
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    }

?>
<?php 

        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');
        // include_once('../config/config.php');
        // $numeroCitas = numeroCitas;
        // $date = date('Y-m-d');
        // $buscarCitas="SELECT * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) WHERE fecha_cita='$date'";
        // $conectando = new Conection();
        // $listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        // if (pg_num_rows( $listaCitas) >= $numeroCitas) {
        //     print ("<script>alert('Ya no quedan citas!.');</script>");
        //     print('<meta http-equiv="refresh" content="0; URL=../vistas/listas_citas.php">');
        // }else{
?> 
    
    <!--  main container -->
    <div class="content">

        <!-- end upper main stats -->

        <div id="pad-wrapper" class="form-page">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row form-wrapper">
                <!-- left column -->

                <div class="col-md-2"></div><!--primera columna de centrado-->
                <div id="miPagina" class="col-md-7 column"><!--segunda columna de centrado-->
                    <h2 align="center">Registrar Cita</h2></br></br>

                    <!---->
                     <form method="POST" action="citas.php">
    
                        <div class="field-box">
                            <label>Cedula:</label>
                            <div class="col-md-7">
                                <input value="<?php echo $_POST['ci_pacnt'];?>" name="ci_pacnt" id="ci_pacnt" class="form-control" required type="number" min="00000000" max="99999999" placeholder="12345678" autofocus>
                            </div>        
                                            
                       <div class="action">
                            <input type="submit"  class="btn-flat" id="buscar" value="Buscar"></input>
                        </div> 
                        
                    </form>
                    <hr>

                        <?php include_once('form_citas.php');  ?>

                </div>
            
            </div>
        </div>
    </div>
<?php
// }
?>