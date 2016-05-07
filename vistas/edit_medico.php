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
                                <input name="fn_medic" value="<?php echo strftime("%d-%m-%Y",strtotime($medico['fn_medic'])); ?>" id="fn_medic" class="form-control" type="text" placeholder="Click Aqui" required type="text">

                                        <script type="text/javascript">
                                          Calendar.setup(
                                            {
                                          inputField : "fn_medic",
                                          ifFormat   : "%d-%m-%Y",
                                          //button     : "Image1"
                                            }
                                          );
                                          
                                        $("#fn_medic").keypress(function(e) {
                                           return false;
                                        });
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
                            <div class="col-md-2">
                                        <select name="cod_tlf" id="cod_tlf" class="form-control">
                                            <option value="0412" <?php if($medico['cod_tlf'] == "0412"){ echo "selected";} ?>>0412</option>
                                            <option value="0414" <?php if($medico['cod_tlf'] == "0414"){ echo "selected";} ?>>0414</option>
                                            <option value="0424" <?php if($medico['cod_tlf'] == "0424"){ echo "selected";} ?>>0424</option>
                                            <option value="0416" <?php if($medico['cod_tlf'] == "0416"){ echo "selected";} ?>>0416</option>
                                            <option value="0426" <?php if($medico['cod_tlf'] == "0426"){ echo "selected";} ?>>0426</option>
                                            <option value="0212" <?php if($medico['cod_tlf'] == "0212"){ echo "selected";} ?>>0212</option>
                                            <option value="0234" <?php if($medico['cod_tlf'] == "0234"){ echo "selected";} ?>>0234</option>
                                            <option value="0235" <?php if($medico['cod_tlf'] == "0235"){ echo "selected";} ?>>0235</option>
                                            <option value="0237" <?php if($medico['cod_tlf'] == "0237"){ echo "selected";} ?>>0237</option>
                                            <option value="0238" <?php if($medico['cod_tlf'] == "0238"){ echo "selected";} ?>>0238</option>
                                            <option value="0239" <?php if($medico['cod_tlf'] == "0239"){ echo "selected";} ?>>0239</option>
                                            <option value="0240" <?php if($medico['cod_tlf'] == "0240"){ echo "selected";} ?>>0240</option>
                                            <option value="0241" <?php if($medico['cod_tlf'] == "0241"){ echo "selected";} ?>>0241</option>
                                            <option value="0242" <?php if($medico['cod_tlf'] == "0242"){ echo "selected";} ?>>0242</option>
                                            <option value="0243" <?php if($medico['cod_tlf'] == "0243"){ echo "selected";} ?>>0243</option>
                                            <option value="0244" <?php if($medico['cod_tlf'] == "0244"){ echo "selected";} ?>>0244</option>
                                            <option value="0245" <?php if($medico['cod_tlf'] == "0245"){ echo "selected";} ?>>0245</option>
                                            <option value="0246" <?php if($medico['cod_tlf'] == "0246"){ echo "selected";} ?>>0246</option>
                                            <option value="0247" <?php if($medico['cod_tlf'] == "0247"){ echo "selected";} ?>>0247</option>
                                            <option value="0248" <?php if($medico['cod_tlf'] == "0248"){ echo "selected";} ?>>0248</option>
                                            <option value="0249" <?php if($medico['cod_tlf'] == "0249"){ echo "selected";} ?>>0249</option>
                                            <option value="0251" <?php if($medico['cod_tlf'] == "0251"){ echo "selected";} ?>>0251</option>
                                            <option value="0252" <?php if($medico['cod_tlf'] == "0252"){ echo "selected";} ?>>0252</option>
                                            <option value="0253" <?php if($medico['cod_tlf'] == "0253"){ echo "selected";} ?>>0253</option>
                                            <option value="0254" <?php if($medico['cod_tlf'] == "0254"){ echo "selected";} ?>>0254</option>
                                            <option value="0255" <?php if($medico['cod_tlf'] == "0255"){ echo "selected";} ?>>0255</option>
                                            <option value="0256" <?php if($medico['cod_tlf'] == "0256"){ echo "selected";} ?>>0256</option>
                                            <option value="0257" <?php if($medico['cod_tlf'] == "0257"){ echo "selected";} ?>>0257</option>
                                            <option value="0258" <?php if($medico['cod_tlf'] == "0258"){ echo "selected";} ?>>0258</option>
                                            <option value="0259" <?php if($medico['cod_tlf'] == "0259"){ echo "selected";} ?>>0259</option>
                                            <option value="0261" <?php if($medico['cod_tlf'] == "0261"){ echo "selected";} ?>>0261</option>
                                            <option value="0262" <?php if($medico['cod_tlf'] == "0262"){ echo "selected";} ?>>0262</option>
                                            <option value="0263" <?php if($medico['cod_tlf'] == "0263"){ echo "selected";} ?>>0263</option>
                                            <option value="0264" <?php if($medico['cod_tlf'] == "0264"){ echo "selected";} ?>>0264</option>
                                            <option value="0265" <?php if($medico['cod_tlf'] == "0265"){ echo "selected";} ?>>0265</option>
                                            <option value="0266" <?php if($medico['cod_tlf'] == "0266"){ echo "selected";} ?>>0266</option>
                                            <option value="0267" <?php if($medico['cod_tlf'] == "0267"){ echo "selected";} ?>>0267</option>
                                            <option value="0268" <?php if($medico['cod_tlf'] == "0268"){ echo "selected";} ?>>0268</option>
                                            <option value="0269" <?php if($medico['cod_tlf'] == "0269"){ echo "selected";} ?>>0269</option>
                                            <option value="0271" <?php if($medico['cod_tlf'] == "0271"){ echo "selected";} ?>>0271</option>
                                            <option value="0272" <?php if($medico['cod_tlf'] == "0272"){ echo "selected";} ?>>0272</option>
                                            <option value="0273" <?php if($medico['cod_tlf'] == "0273"){ echo "selected";} ?>>0273</option>
                                            <option value="0274" <?php if($medico['cod_tlf'] == "0274"){ echo "selected";} ?>>0274</option>
                                            <option value="0275" <?php if($medico['cod_tlf'] == "0275"){ echo "selected";} ?>>0275</option>
                                            <option value="0276" <?php if($medico['cod_tlf'] == "0276"){ echo "selected";} ?>>0276</option>
                                            <option value="0277" <?php if($medico['cod_tlf'] == "0277"){ echo "selected";} ?>>0277</option>
                                            <option value="0278" <?php if($medico['cod_tlf'] == "0278"){ echo "selected";} ?>>0278</option>
                                            <option value="0279" <?php if($medico['cod_tlf'] == "0279"){ echo "selected";} ?>>0279</option>
                                            <option value="0281" <?php if($medico['cod_tlf'] == "0281"){ echo "selected";} ?>>0281</option>
                                            <option value="0282" <?php if($medico['cod_tlf'] == "0282"){ echo "selected";} ?>>0282</option>
                                            <option value="0283" <?php if($medico['cod_tlf'] == "0283"){ echo "selected";} ?>>0283</option>
                                            <option value="0284" <?php if($medico['cod_tlf'] == "0284"){ echo "selected";} ?>>0284</option>
                                            <option value="0285" <?php if($medico['cod_tlf'] == "0285"){ echo "selected";} ?>>0285</option>
                                            <option value="0286" <?php if($medico['cod_tlf'] == "0286"){ echo "selected";} ?>>0286</option>
                                            <option value="0287" <?php if($medico['cod_tlf'] == "0287"){ echo "selected";} ?>>0287</option>
                                            <option value="0288" <?php if($medico['cod_tlf'] == "0288"){ echo "selected";} ?>>0288</option>
                                            <option value="0289" <?php if($medico['cod_tlf'] == "0289"){ echo "selected";} ?>>0289</option>
                                            <option value="0291" <?php if($medico['cod_tlf'] == "0291"){ echo "selected";} ?>>0291</option>
                                            <option value="0292" <?php if($medico['cod_tlf'] == "0292"){ echo "selected";} ?>>0292</option>
                                            <option value="0293" <?php if($medico['cod_tlf'] == "0293"){ echo "selected";} ?>>0293</option>
                                            <option value="0294" <?php if($medico['cod_tlf'] == "0294"){ echo "selected";} ?>>0294</option>
                                            <option value="0295" <?php if($medico['cod_tlf'] == "0295"){ echo "selected";} ?>>0295</option>

                                        </select>
                                    </div>
                            <div class="col-md-5">
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
