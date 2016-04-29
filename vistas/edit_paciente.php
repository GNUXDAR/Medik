<?php  //modulo de session
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    } 
        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');
        ini_set('display_errors', 'on');  //muestra los errores de php
        $id_pacnt = $_GET['id_paciente'];
        $buscarCitas="SELECT * FROM  pacnt_cnslt WHERE id_pacnt='$id_pacnt'";
        $conectando = new Conection();
        $listaCitas = pg_query($conectando->conectar(), $buscarCitas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        $paciente = pg_fetch_array($listaCitas);
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
                    <h2 align="center">Modificar Pacientes</h2></br></br>
                     
                    <hr>
                    <form method="POST" action="../control/upd_paciente.php" autocomplete="off">
                       
                            <div class="field-box">
                                <label>Cedula Paciente:</label>
                                <div class="col-md-7">
                                     <input value="<?php echo $paciente['ci_pacnt']; ?>" name="ci_pacnt" id="ci_pacnt" class="form-control" required type="text"  placeholder="12345678" autofocus>
                                </div>                            
                            </div>
                            <div class="field-box">
                                <label>Nombre Paciente:</label>
                                <div class="col-md-7">
                                    <input name="nom_pacnt" value="<?php echo $paciente['nom_pacnt']; ?>" id="nom_pacnt" class="form-control" type="text" required type="text" autofocus>
                                </div>                            
                            </div>

                            <div class="field-box">
                                <label>Apellido Paciente:</label>
                                <div class="col-md-7">
                                    <input name="apel_pacnt" value="<?php echo $paciente['apel_pacnt']; ?>" id="apel_pacnt" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text">
                                </div>                            
                            </div>
                            <div class="field-box">
                                <label>Sexo:</label>
                                <div class="col-md-4">
                                <select class="form-control" name="sexo_pacnt">
                                    
                                    <?php
                                        if ($paciente['sexo_pacnt'] == 'Masculino') {
                                            echo '
                                                <option value="Masculino" selected >Masculino</option>
                                                <option value="Femenino" >Femenino</option>
                                            ';
                                        }else{
                                             echo '
                                                <option value="Masculino"  >Masculino</option>
                                                <option value="Femenino" selected>Femenino</option>
                                            ';
                                        }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="field-box">
                                <label>Fecha de Nacimiento:</label>
                                <div class="col-md-7">
                                    <input name="fn_pacnt" value="<?php echo $paciente['fn_pacnt']; ?>" id="fn_pacnt" class="form-control" type="text" placeholder="Click Aqui" required type="text">

                                            <script type="text/javascript">
                                              Calendar.setup(
                                                {
                                              inputField : "fn_pacnt",
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
                                    <input type="text" name="dir_pacnt" value="<?php echo $paciente['dir_pacnt']; ?>" id="dir_pacnt" class="form-control" placeholder="Ingrese Aqui" required>
                                </div>
                            </div>

                            <div class="field-box">
                                <label>Coreo:</label>
                                <div class="col-md-7">
                                    <input type="text" name="mail_pacnt" value="<?php echo $paciente['mail_pacnt']; ?>" id="mail_pacnt" class="form-control" placeholder="
                                    @" required>
                                </div>
                            </div>

                            <div class="field-box">
                                <label>Num Telefono:</label>
                                <div class="col-md-7">
                                    <input type="number" name="tlf_pacnt" value="<?php echo $paciente['tlf_pacnt']; ?>" id="tlf_pacnt" class="form-control" placeholder="Ingrese Aqui" required>
                                </div>
                            </div>
                            
                            <div class="action">
                                <input type="hidden" name="id_pacnt" value="<?php echo $paciente['id_pacnt']; ?>">
                                <input type="submit"  class="btn btn-primary" id="editar" value="Editar" >
                                
                            </div> 
                        
                        
                    </form>

                </div>
            
            </div>
        </div>
    </div>
