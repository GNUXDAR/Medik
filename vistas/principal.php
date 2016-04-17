<?php  

    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }
?>
<?php 
        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');

?>  
    <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>MEDIk</h3></br>
                <h4>- Sistema de citas Medicas -</h4></br>
                
            </div>

            
        </div>
        
    </div>
