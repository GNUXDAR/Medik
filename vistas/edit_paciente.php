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
        if (pg_num_rows($listaCitas) > 0) {
          
        
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
                                    <div class="col-md-2">
                                        <select name="cod_tlf_pacnt" id="cod_tlf_pacnt" class="form-control">
                                            <option value="0412" <?php if($paciente['cod_tlf_pacnt'] == "0412"){ echo "selected";} ?>>0412</option>
                                            <option value="0414" <?php if($paciente['cod_tlf_pacnt'] == "0414"){ echo "selected";} ?>>0414</option>
                                            <option value="0424" <?php if($paciente['cod_tlf_pacnt'] == "0424"){ echo "selected";} ?>>0424</option>
                                            <option value="0416" <?php if($paciente['cod_tlf_pacnt'] == "0416"){ echo "selected";} ?>>0416</option>
                                            <option value="0426" <?php if($paciente['cod_tlf_pacnt'] == "0426"){ echo "selected";} ?>>0426</option>
                                            <option value="0212" <?php if($paciente['cod_tlf_pacnt'] == "0212"){ echo "selected";} ?>>0212</option>
                                            <option value="0234" <?php if($paciente['cod_tlf_pacnt'] == "0234"){ echo "selected";} ?>>0234</option>
                                            <option value="0235" <?php if($paciente['cod_tlf_pacnt'] == "0235"){ echo "selected";} ?>>0235</option>
                                            <option value="0237" <?php if($paciente['cod_tlf_pacnt'] == "0237"){ echo "selected";} ?>>0237</option>
                                            <option value="0238" <?php if($paciente['cod_tlf_pacnt'] == "0238"){ echo "selected";} ?>>0238</option>
                                            <option value="0239" <?php if($paciente['cod_tlf_pacnt'] == "0239"){ echo "selected";} ?>>0239</option>
                                            <option value="0240" <?php if($paciente['cod_tlf_pacnt'] == "0240"){ echo "selected";} ?>>0240</option>
                                            <option value="0241" <?php if($paciente['cod_tlf_pacnt'] == "0241"){ echo "selected";} ?>>0241</option>
                                            <option value="0242" <?php if($paciente['cod_tlf_pacnt'] == "0242"){ echo "selected";} ?>>0242</option>
                                            <option value="0243" <?php if($paciente['cod_tlf_pacnt'] == "0243"){ echo "selected";} ?>>0243</option>
                                            <option value="0244" <?php if($paciente['cod_tlf_pacnt'] == "0244"){ echo "selected";} ?>>0244</option>
                                            <option value="0245" <?php if($paciente['cod_tlf_pacnt'] == "0245"){ echo "selected";} ?>>0245</option>
                                            <option value="0246" <?php if($paciente['cod_tlf_pacnt'] == "0246"){ echo "selected";} ?>>0246</option>
                                            <option value="0247" <?php if($paciente['cod_tlf_pacnt'] == "0247"){ echo "selected";} ?>>0247</option>
                                            <option value="0248" <?php if($paciente['cod_tlf_pacnt'] == "0248"){ echo "selected";} ?>>0248</option>
                                            <option value="0249" <?php if($paciente['cod_tlf_pacnt'] == "0249"){ echo "selected";} ?>>0249</option>
                                            <option value="0251" <?php if($paciente['cod_tlf_pacnt'] == "0251"){ echo "selected";} ?>>0251</option>
                                            <option value="0252" <?php if($paciente['cod_tlf_pacnt'] == "0252"){ echo "selected";} ?>>0252</option>
                                            <option value="0253" <?php if($paciente['cod_tlf_pacnt'] == "0253"){ echo "selected";} ?>>0253</option>
                                            <option value="0254" <?php if($paciente['cod_tlf_pacnt'] == "0254"){ echo "selected";} ?>>0254</option>
                                            <option value="0255" <?php if($paciente['cod_tlf_pacnt'] == "0255"){ echo "selected";} ?>>0255</option>
                                            <option value="0256" <?php if($paciente['cod_tlf_pacnt'] == "0256"){ echo "selected";} ?>>0256</option>
                                            <option value="0257" <?php if($paciente['cod_tlf_pacnt'] == "0257"){ echo "selected";} ?>>0257</option>
                                            <option value="0258" <?php if($paciente['cod_tlf_pacnt'] == "0258"){ echo "selected";} ?>>0258</option>
                                            <option value="0259" <?php if($paciente['cod_tlf_pacnt'] == "0259"){ echo "selected";} ?>>0259</option>
                                            <option value="0261" <?php if($paciente['cod_tlf_pacnt'] == "0261"){ echo "selected";} ?>>0261</option>
                                            <option value="0262" <?php if($paciente['cod_tlf_pacnt'] == "0262"){ echo "selected";} ?>>0262</option>
                                            <option value="0263" <?php if($paciente['cod_tlf_pacnt'] == "0263"){ echo "selected";} ?>>0263</option>
                                            <option value="0264" <?php if($paciente['cod_tlf_pacnt'] == "0264"){ echo "selected";} ?>>0264</option>
                                            <option value="0265" <?php if($paciente['cod_tlf_pacnt'] == "0265"){ echo "selected";} ?>>0265</option>
                                            <option value="0266" <?php if($paciente['cod_tlf_pacnt'] == "0266"){ echo "selected";} ?>>0266</option>
                                            <option value="0267" <?php if($paciente['cod_tlf_pacnt'] == "0267"){ echo "selected";} ?>>0267</option>
                                            <option value="0268" <?php if($paciente['cod_tlf_pacnt'] == "0268"){ echo "selected";} ?>>0268</option>
                                            <option value="0269" <?php if($paciente['cod_tlf_pacnt'] == "0269"){ echo "selected";} ?>>0269</option>
                                            <option value="0271" <?php if($paciente['cod_tlf_pacnt'] == "0271"){ echo "selected";} ?>>0271</option>
                                            <option value="0272" <?php if($paciente['cod_tlf_pacnt'] == "0272"){ echo "selected";} ?>>0272</option>
                                            <option value="0273" <?php if($paciente['cod_tlf_pacnt'] == "0273"){ echo "selected";} ?>>0273</option>
                                            <option value="0274" <?php if($paciente['cod_tlf_pacnt'] == "0274"){ echo "selected";} ?>>0274</option>
                                            <option value="0275" <?php if($paciente['cod_tlf_pacnt'] == "0275"){ echo "selected";} ?>>0275</option>
                                            <option value="0276" <?php if($paciente['cod_tlf_pacnt'] == "0276"){ echo "selected";} ?>>0276</option>
                                            <option value="0277" <?php if($paciente['cod_tlf_pacnt'] == "0277"){ echo "selected";} ?>>0277</option>
                                            <option value="0278" <?php if($paciente['cod_tlf_pacnt'] == "0278"){ echo "selected";} ?>>0278</option>
                                            <option value="0279" <?php if($paciente['cod_tlf_pacnt'] == "0279"){ echo "selected";} ?>>0279</option>
                                            <option value="0281" <?php if($paciente['cod_tlf_pacnt'] == "0281"){ echo "selected";} ?>>0281</option>
                                            <option value="0282" <?php if($paciente['cod_tlf_pacnt'] == "0282"){ echo "selected";} ?>>0282</option>
                                            <option value="0283" <?php if($paciente['cod_tlf_pacnt'] == "0283"){ echo "selected";} ?>>0283</option>
                                            <option value="0284" <?php if($paciente['cod_tlf_pacnt'] == "0284"){ echo "selected";} ?>>0284</option>
                                            <option value="0285" <?php if($paciente['cod_tlf_pacnt'] == "0285"){ echo "selected";} ?>>0285</option>
                                            <option value="0286" <?php if($paciente['cod_tlf_pacnt'] == "0286"){ echo "selected";} ?>>0286</option>
                                            <option value="0287" <?php if($paciente['cod_tlf_pacnt'] == "0287"){ echo "selected";} ?>>0287</option>
                                            <option value="0288" <?php if($paciente['cod_tlf_pacnt'] == "0288"){ echo "selected";} ?>>0288</option>
                                            <option value="0289" <?php if($paciente['cod_tlf_pacnt'] == "0289"){ echo "selected";} ?>>0289</option>
                                            <option value="0291" <?php if($paciente['cod_tlf_pacnt'] == "0291"){ echo "selected";} ?>>0291</option>
                                            <option value="0292" <?php if($paciente['cod_tlf_pacnt'] == "0292"){ echo "selected";} ?>>0292</option>
                                            <option value="0293" <?php if($paciente['cod_tlf_pacnt'] == "0293"){ echo "selected";} ?>>0293</option>
                                            <option value="0294" <?php if($paciente['cod_tlf_pacnt'] == "0294"){ echo "selected";} ?>>0294</option>
                                            <option value="0295" <?php if($paciente['cod_tlf_pacnt'] == "0295"){ echo "selected";} ?>>0295</option>

                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                            <input type="number" name="tlf_pacnt" value="<?php echo $paciente['tlf_pacnt'];?>" id="tlf_pacnt" class="form-control" placeholder="Ingrese Aqui" required>
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
<?php
        }else{
            print ("<script>alert('No hay Resgistro!.');</script>");
            print('<meta http-equiv="refresh" content="0; URL=pacientes_shows.php">');
        } 
?>