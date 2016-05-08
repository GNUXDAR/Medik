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
        $buscarCitas="SELECT * FROM  cita_cnslt INNER JOIN pacnt_cnslt ON (cita_cnslt.ci_pacnt_cita = pacnt_cnslt.ci_pacnt) WHERE fecha_cita = '$fecha' AND estatus = '0' ";
        $conectando = new Conection();

        $listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        $resul = pg_fetch_all($listaCitas);
?>  
    <div class="content">
        <div id="pad-wrapper" class="form-page" >
            <div class="row header">
                <h3>SISTRAERCA</h3></br>
                <h4>- Sistema de citas Medicas -</h4>
                
            </div>
            <?php if (pg_num_rows($listaCitas) > 0) { ?>
           
             <div class="row">
                <div class="col col-md-2">
                    <div class="alert alert-info">
                        <a  href="listas_citas.php" class="">Citas del Dia <span class="badge"><?php echo pg_num_rows($listaCitas); ?></span></a>
                    </div>                    
                </div>            
            </div>
            <?php } ?>
            <div class="logo">
                
            </div>
                       
        </div>
        
            
        </div>

     
    </div>
