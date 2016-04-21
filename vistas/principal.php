<?php  
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    }
        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');

?>  
    <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>SISTRAERCA</h3></br>
                <h4>- Sistema de citas Medicas -</h4></br>
                
            </div>

            <div class="row">
                <div class="col col-4">
                    <a  href="listas_citas.php" class="btn btn-default">Citas del Dia</a>
                </div>
            
            </div>

            
        </div>
        
            
        </div>

     
    </div>
