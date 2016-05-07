<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    }
    include_once('../control/conexion.php');
    include_once('sidebar.php');
    include_once('script.php');

    ini_set('display_errors', 'on');

    $id_cita = $_GET["id_cita"];

    $modificar="SELECT * FROM cita_cnslt INNER JOIN pacnt_cnslt ON cita_cnslt.ci_pacnt_cita =  pacnt_cnslt.ci_pacnt WHERE id_cita = '$id_cita'";
    $conectando = new Conection();

    $verifica = pg_query($conectando->conectar(), $modificar) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
    $localizar=pg_num_rows($verifica);

    if ($localizar > 0){  //inicio if 

            $ATRIBUTO=pg_fetch_array($verifica);


    echo'  <!--  main container -->
    <div class="content">

        <!-- end upper main stats -->

        <div id="pad-wrapper" class="form-page">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row form-wrapper">
                <!-- left column -->

                <div class="col-md-2"></div><!--primera columna de centrado-->
                <div id="miPagina" class="col-md-7 column"><!--segunda columna de centrado-->
                    <h2 align="center">Modificar Cita</h2></br></br>

        <div class="row">
        <div class="col-md-7"> <b>Modificando Cita a:</>
         '.$ATRIBUTO['nom_pacnt'].'
         '.$ATRIBUTO['apel_pacnt'].'
          </div>
         </div> <hr>';


         echo '
                        
                    <form method="POST" action="../control/upd_cita.php" autocomplete="off">
                        <div class="field-box">
                            <label>Fecha de Cita:</label>
                            <div class="col-md-7">
                                <input type="hidden" value="'.$id_cita.'" name="id_cita">
                                <input name="fecha_cita" id="fecha_cita" class="form-control" type="text" placeholder="Click Aqui" required type="text" value="'.strftime("%d-%m-%Y",strtotime($ATRIBUTO['fecha_cita'])).'">

                                        <script type="text/javascript">
                                          Calendar.setup(
                                            {
                                          inputField : "fecha_cita",
                                          ifFormat   : "%d-%m-%Y",
                                          //button     : "Image1"
                                          disableFunc: function(date) {
                                                        var now= new Date();     
            
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
                                            },
                                     });
                                        
                                        $("#fecha_cita").keypress(function(e) {
                                           return false;
                                        });
                                        </script>
                                    

                            </div>                            
                        </div>
'; ?>
                        <div class="field-box">
                            <label>Motivo Cita:</label>
                            <div class="col-md-7">
                                <select required  name="motivo_cita" id="motivo_cita" class="form-control">
                                    <option  value="">Seleccione</option>
                                    <option value="Motivo 1" <?php if($ATRIBUTO['motivo_cita'] == 'Motivo 1'){ echo 'selected'; }?> >Motivo 1</option>
                                    <option value="Motivo 2" <?php if($ATRIBUTO['motivo_cita'] == 'Motivo 2'){ echo 'selected'; }?> >Motivo 2</option>
                                    <option value="Motivo 2" <?php if($ATRIBUTO['motivo_cita'] == 'Motivo 2'){ echo 'selected'; }?> >Motivo 2</option> 
                                    <option value="Otros"    <?php if($ATRIBUTO['motivo_cita'] == 'Otros'){ echo 'selected'; }?> >Otros</option>                                            
                                </select>
                            </div>
                        </div>
<?php echo '
                        <div class="field-box">
                            <label>Acompanante:</label>
                            <div class="col-md-7">
                                <input type="text" name="acmp_cita" id="acmp_cita" class="form-control" placeholder="Ingrese Aqui" value="'.$ATRIBUTO['acmp_cita'].'" >
                            </div>
                        </div>
                        <div class="field-box">
                            <label>Observación</label>
                            <div class="col-md-7">
                                 <textarea name="observacion_cita" id="observacion_cita" class="form-control" placeholder="Observación">'.$ATRIBUTO['observacion_cita'].'</textarea>
                            </div>
                           
                        </div>
                        
                        <div class="action">
                            <input type="submit"  class="btn-flat" id="editar" value="Editar" >
                             <a href="listas_citas.php" class="btn btn-default">Cancelar</a>
                        </div> 
                        
                        
                    </form>';
}//fin if
else{

}
?>
