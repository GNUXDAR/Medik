<?php  //modulo de session
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    } 
        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');
        $id_medic = $_GET['id_medic'];
        ini_set('display_errors', 'on');  //muestra los errores de php
        $sql="SELECT * FROM  medic_cnslt WHERE id_medic='$id_medic'";
        $conectando = new Conection();
        $query = pg_query($conectando->conectar(), $sql) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        $medico = pg_fetch_array($query);
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
                    <h2 align="center">Modificar Medico</h2></br></br>

                    <!---->
                      <form method="POST" action="../control/upd_medico.php" autocomplete="off">
                    

                        <div class="field-box">
                            <label>Nombre:</label>
                            <div class="col-md-7">
                                <input name="nom_medic" value="<?php echo $medico['nom_medic']; ?>" id="nom_medic" class="form-control" type="text" required type="text" autofocus>
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Apellido:</label>
                            <div class="col-md-7">
                                <input name="apel_medic" value="<?php echo $medico['apel_medic']; ?>" id="apel_medic" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text">
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Cedula:</label>
                            <div class="col-md-7">
                               <input value="<?php echo $medico['ci_medic']; ?>" name="ci_medic" id="ci_medic" class="form-control" required type="text" min="00000000" max="99999999" placeholder="12345678" autofocus>
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Especialidad:</label>
                            <div class="col-md-7">                                
                                <select name="espc_medic" class="form-control" id="espc_medic">
                                    <option value="GENERAL"  <?php if ($medico['espc_medic'] == 'GENERAL') { echo "selected" ;   } ?> >General</option>
                                    <option value="INTERNISTA" <?php if ($medico['espc_medic'] == 'INTERNISTA') { echo "selected" ;   } ?>>Internista</option>
                                    <option value="TRAUMATOLOGO" <?php if ($medico['espc_medic'] == 'TRAUMATOLOGO') { echo "selected" ;   } ?> >Traumatologo</option>
                                </select>                                
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Fecha de Nacimiento:</label>
                            <div class="col-md-7">
                                <input name="fn_medic" value="<?php echo $medico['fn_medic']; ?>" id="fn_medic" class="form-control" type="text" placeholder="Click Aqui" required type="text">

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
                                <input type="text" name="dir_medic" value="<?php echo $medico['dir_medic']; ?>" id="dir_medic" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Coreo:</label>
                            <div class="col-md-7">
                                <input type="text" name="mail_medic" value="<?php echo $medico['mail_medic']; ?>" id="mail_medic" class="form-control" placeholder="  @" required>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Num Telefono:</label>
                            <div class="col-md-7">
                                <input type="number" name="tlf_medic" value="<?php echo $medico['tlf_medic']; ?>" id="tlf_medic" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>


                        
                        
                        <div class="action">
                            <input type="hidden" name="id_medic" value="<?php echo $medico['id_medic']; ?>">
                            <input type="submit"  class="btn btn-primary" id="editar" value="Editar" >
                            <a href="index_medicos.php" class="btn btn-default">Cancelar</a>
                            
                        </div> 
                        
                        
                    </form>
                </div>
            
            </div>
        </div>
    </div>
