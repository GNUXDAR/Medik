<?php  //modulo de session
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
        ini_set('display_errors', 'on');  //muestra los errores de php

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
					<h2 align="center">Registrar Medicos</h2></br></br>

                    <!---->
                     <form method="POST" action="medicos.php">
    
                        <div class="field-box">
                            <label>Cedula:</label>
                            <div class="col-md-7">
                                <input value="<?php echo $_POST['ci_medic'];?>" name="ci_medic" id="ci_medic" class="form-control" required type="number" min="00000000" max="30000000" placeholder="12345678" autofocus>
                            </div>        
                                            
                       <div class="action">
                            <input type="submit"  class="btn-flat" id="buscar" value="Buscar"></input>
                        </div> 
                        
                    </form>
                    <hr>

<?php 

if($_POST){  //inicio if _POST

$ci_medic = $_POST['ci_medic'];

$buscarPersona="SELECT * FROM medic_cnslt WHERE ci_medic='$ci_medic'";
$conectando = new Conection();

$verificaPersona = pg_query($conectando->conectar(), $buscarPersona) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
$localizarPersona=pg_num_rows($verificaPersona);


    if ($localizarPersona == 0){  //inicio if registrar medico

        $ATRIBUTO=pg_fetch_array($verificaPersona);

        echo '<div class="row">
        <div class="col-md-7"> <b>Registrando Nuevo Medico</>
          </div>
         </div> <hr>';



         echo '
                        
                    <form method="POST" action="../control/reg_medico.php" autocomplete="off">
                    <input value="'.$ci_medic.'" name="ci_medic" id="ci_medic" class="form-control" required type="hidden" min="00000000" max="99999999" placeholder="12345678" autofocus>

                        <div class="field-box">
                            <label>Nombre Paciente:</label>
                            <div class="col-md-7">
                                <input name="nom_medic" id="nom_medic" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text" autofocus>
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Apellido Paciente:</label>
                            <div class="col-md-7">
                                <input name="apel_medic" id="apel_medic" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text">
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Especialidad:</label>
                            <div class="col-md-7">
                                <input type="text" name="espc_medic" id="espc_medic" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Fecha de Nacimiento:</label>
                            <div class="col-md-7">
                                <input name="fn_medic" id="fn_medic" class="form-control" type="text" placeholder="Click Aqui" required type="text">

                                        <script type="text/javascript">
                                          Calendar.setup(
                                            {
                                          inputField : "fn_medic",
                                          ifFormat   : "%Y/%m/%d",
                                          //button     : "Image1"
                                            }
                                          );
                                        </script>
                                    

                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Direccion:</label>
                            <div class="col-md-7">
                                <input type="text" name="dir_medic" id="dir_medic" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Coreo:</label>
                            <div class="col-md-7">
                                <input type="text" name="mail_medic" id="mail_medic" class="form-control" placeholder="
                                @" required>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Num Telefono:</label>
                            <div class="col-md-7">
                                <input type="number" name="tlf_medic" id="tlf_medic" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>
                        
                        <div class="action">
                            <input type="submit"  class="btn btn-primary" id="registrar" value="Registrar" >
                            
                        </div> 
                        
                        
                    </form>';


}//fin if registra medico

else{ 
    
    print ("<script>alert('El medico con la cedula:$ci_medic ya esta Registrado');</script>");

     }

?>

<?php

} //fin if _POST

?>

                </div>
            
            </div>
        </div>
    </div>
