<?php  
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    }
        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');
        $fecha = date('Y-m-d');
        $buscarCitas="SELECT * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) WHERE fecha_cita = '$fecha'";
        $conectando = new Conection();

        $listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        $resul = pg_fetch_all($listaCitas);
?>  
    <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>SISTRAERCA</h3></br>
                <h4>- Sistema de citas Medicas -</h4></br>
                
            </div>

            <div class="row">
                <div class="col col-4">
                    <a  href="listas_citas.php" class="btn btn-info">Citas del Dia <span class="badge"><?php echo pg_num_rows($listaCitas); ?></span></a>
                </div>
            
            </div>

            
        </div>
        
            
        </div>

     
    </div>
