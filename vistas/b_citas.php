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
    
    <!--  main container -->
    <div class="content">

        <!-- end upper main stats -->

        <div id="pad-wrapper" class="form-page">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row form-wrapper">
                <!-- left column -->

                <div class="col-md-2"></div><!--primera columna de centrado-->
                <div id="miPagina" class="col-md-7 column"><!--segunda columna de centrado-->
					<h2 align="center">Consultar Cita</h2></br></br>

                    <!---->
                     <form method="POST" action="b_citas.php">
    
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

<?php 
ini_set('display_errors', 'on');

if($_POST){
    $ci_pacnt = $_POST['ci_pacnt'];

    $buscar="SELECT * FROM cita_cnslt WHERE ci_pacnt_cita='$ci_pacnt'";
    $conectando = new Conection();

    $verifica = pg_query($conectando->conectar(), $buscar) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
    $localizar=pg_num_rows($verifica);



    if ($localizar > 0){      //inicio if 2
        $buscarPersona="SELECT * FROM pacnt_cnslt WHERE ci_pacnt='$ci_pacnt'";

        $verificaPersona = pg_query($conectando->conectar(), $buscarPersona) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        $localizarPersona=pg_num_rows($verificaPersona);

        if ($localizarPersona > 0){  //inicio if 3

            $ATRIBUTO=pg_fetch_array($verificaPersona);


            echo '<div class="row">
            <div class="col-md-7"> <b>Cita(s) de:</>
             '.$ATRIBUTO['nom_pacnt'].'
             '.$ATRIBUTO['apel_pacnt'].'
              </div>
             </div> <hr><br>';



             echo '<center>
             <div class="col-md-12">
             <table class="table table-striped table-bordered table-hover table-heading no-border-bottom" id="tabla_muetral" border="1" cellpadding="2">

                <tr id="esquema_tabla">

                    <th>Fecha Cita</th>
                    <th>Motivo</th>
                    <th>Acompanante</th>
                </tr>

                <tbody class=".table-striped">';

                 while($ATRIBUTO=pg_fetch_array($verifica)) {

                    echo '<tr>
                     
                        <td>'.$ATRIBUTO['fecha_cita'].'</td>
                        <td>'.$ATRIBUTO['motivo_cita'].'</td>
                        <td>'.$ATRIBUTO['acmp_cita'].'</td>
                        </tr>';

                 }';

                 </tbody>

                </table>
                </div>
                </center>';


        }//fin de if 3

    }//fin if 2


        else{
            print ("<script>alert('El paciente con la Cedula: $ci_pacnt No tiene Cita');</script>");

}
}
?>

                </div>
            
            </div>
        </div>
    </div>
