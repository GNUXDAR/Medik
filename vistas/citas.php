<?php  //modulo de session
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    }
ini_set('display_errors', 'on');
?>
<?php 

        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');
        include_once('../config/config.php');
        $date = date('Y-m-d');
        $sql="SELECT * FROM  pacnt_cnslt";
        $conectando = new Conection();
        $query = pg_query($conectando->conectar(), $sql) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        $pacientes = pg_fetch_all($query);
        $sql_num_citas="SELECT * FROM  cita_cnslt WHERE fecha_cita='$date'";
        $query_num_citas = pg_query($conectando->conectar(), $sql_num_citas) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        
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
                    
                            <?php if (pg_num_rows( $query_num_citas) >= NUMERO_CITAS) { ?>
                            <div class="alert alert-danger">Ya no quedan citas para hoy</div>
                            <?php } ?>                        
                  
                    <!---->
                     <form method="POST" id="registrar_cita" action="../control/reg_cita.php">
                        
                        <div class="field-box">
                            <label>Cedula:</label>
                            <div class="col-md-7">                               
                                <select class="form-control" name="ci_pacnt" id="ci_pacnt" required>
                                    <option value="">Seleccione</option>
                                    <?php
                                        foreach ($pacientes as $paciente) {
                                            echo '<option value="'.$paciente['ci_pacnt'].'">'.$paciente['ci_pacnt'].'</option>';
                                        }
                                    ?>                               
                                </select>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Motivo Cita:</label>
                            <div class="col-md-7">                               
                                <select required  name="motivo_cita" id="motivo_cita" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Fractura">Fractura</option>
                                    <option value="Artritis">Artritis</option>
                                    <option value="Artrosis">Artrosis</option> 
                                    <option value="Otros">Otros</option>                                            
                                </select>
                            </div>
                        </div>
                                            
                        <div class="field-box">
                            <label>Fecha de Cita:</label>
                            <div class="col-md-7">
                                <input autocomplete="off" name="fecha_cita" id="fecha_cita" class="form-control fecha" type="text" placeholder="Click Aqui" required >
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Acompanante:</label>
                            <div class="col-md-7">
                                <input type="text" name="acmp_cita" id="acmp_cita" class="form-control" placeholder="Ingrese Aqui">
                            </div>
                        </div>
                        
                        
                        <div class="field-box">
                            <label>Observación</label>
                            <div class="col-md-7">
                                 <textarea name="observacion_cita" id="observacion_cita" class="form-control" placeholder="Observación"></textarea>
                            </div>
                           
                        </div>
                        
                        <div class="action">
                            <input type="submit"  class="btn-flat" id="registrar" value="Registrar" >
                            <input type="hidden" name="nose" id="nose" >
                        </div>
                        
                    </form>
                    
                </div>
            
            </div>
        </div>
    </div>

<script type="text/javascript">
// ========================================================================
//  Calendar
// ========================================================================
$(function() {

    Calendar.setup({
        inputField : "fecha_cita",
        ifFormat   : "%d-%m-%Y",
        // ingleClick : true,
        disableFunc: function(date) {
            var now= new Date();
            <?php if (pg_num_rows( $query_num_citas) >= NUMERO_CITAS) { ?>
                return (date.getTime() < now.getTime());
            <?php } else { ?>
               
           
            
                    if(date.getFullYear()<now.getFullYear())
                    {
                        return true;
                    }
                    if(date.getFullYear()==now.getFullYear())
                    {
                        if(date.getMonth()<now.getMonth())
                        {
                            return true;
                        }
                    }
                    if(date.getMonth()==now.getMonth())
                    {
                        if(date.getDate()<now.getDate())
                        {
                            return true;
                        }
                    }
            <?php  } ?>
            
        },

    });

    
    $("#fecha_cita").keypress(function(e) {
       return false;
    });


});

</script>
