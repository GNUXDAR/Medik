<?php 

if($_POST){  //inicio if _POST

$ci_medic = $_POST['ci_medic'];

$buscarPersona="SELECT * FROM medic_cnslt WHERE ci_medic='$ci_medic'";
$conectando = new Conection();

$verificaPersona = pg_query($conectando->conectar(), $buscarPersona) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
$localizarPersona=pg_num_rows($verificaPersona);


    if ($localizarPersona == 0){  //inicio if registrar medico

        $ATRIBUTO=pg_fetch_array($verificaPersona);
?>
        <div class="row">
        <div class="col-md-7"> <b class="text-info">Registrando Nuevo Medico</b>
          </div>
         </div> <hr>


                        
                    <form method="POST" id="registrar_medicos" action="../control/reg_medico.php" autocomplete="off">
                    <input value="<?php echo $ci_medic; ?>" name="ci_medic" id="ci_medic" class="form-control" required type="hidden" min="00000000" max="99999999" placeholder="12345678" autofocus>

                        <div class="field-box">
                            <label>Nombre Medico:</label>
                            <div class="col-md-7">
                                <input name="nom_medic" id="nom_medic" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text" autofocus>
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Apellido Medico:</label>
                            <div class="col-md-7">
                                <input name="apel_medic" id="apel_medic" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text">
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Especialidad:</label>
                            <div class="col-md-7">
                                <select name="espc_medic" class="form-control" id="espc_medic">
                                    <option value="GENERAL">General</option>
                                    <option value="INTERNISTA">Internista</option>
                                    <option value="TRAUMATOLOGO">Traumatologo</option>
                                </select>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Fecha de Nacimiento:</label>
                            <div class="col-md-7">
                                <input name="fn_medic" id="fn_medic" class="form-control" type="text" placeholder="Click Aqui" required type="text">

                                        <script type="text/javascript">
                                          Calendar.setup({
                                              inputField : "fn_medic",
                                              ifFormat   : "%d-%m-%Y",
                                              //button     : "Image1"
                                            });
                                         $("#fn_medic").keypress(function(e) {
                                           return false;
                                        });
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
                            <div class="col-md-2">
                                <select name="cod_tlf" id="cod_tlf" class="form-control">
                                    <option value="0412">0412</option>
                                    <option value="0414">0414</option>
                                    <option value="0424">0424</option>
                                    <option value="0416">0416</option>
                                    <option value="0426">0426</option>
                                    <option value="0212">0212</option>
                                    <option value="0234">0234</option>
                                    <option value="0235">0235</option>
                                    <option value="0237">0237</option>
                                    <option value="0238">0238</option>
                                    <option value="0239">0239</option>
                                    <option value="0240">0240</option>
                                    <option value="0241">0241</option>
                                    <option value="0242">0242</option>
                                    <option value="0243">0243</option>
                                    <option value="0244">0244</option>
                                    <option value="0245">0245</option>
                                    <option value="0246">0246</option>
                                    <option value="0247">0247</option>
                                    <option value="0248">0248</option>
                                    <option value="0249">0249</option>
                                    <option value="0251">0251</option>
                                    <option value="0252">0252</option>
                                    <option value="0253">0253</option>
                                    <option value="0254">0254</option>
                                    <option value="0255">0255</option>
                                    <option value="0256">0256</option>
                                    <option value="0257">0257</option>
                                    <option value="0258">0258</option>
                                    <option value="0259">0259</option>
                                    <option value="0261">0261</option>
                                    <option value="0262">0262</option>
                                    <option value="0263">0263</option>
                                    <option value="0264">0264</option>
                                    <option value="0265">0265</option>
                                    <option value="0266">0266</option>
                                    <option value="0267">0267</option>
                                    <option value="0268">0268</option>
                                    <option value="0269">0269</option>
                                    <option value="0271">0271</option>
                                    <option value="0272">0272</option>
                                    <option value="0273">0273</option>
                                    <option value="0274">0274</option>
                                    <option value="0275">0275</option>
                                    <option value="0276">0276</option>
                                    <option value="0277">0277</option>
                                    <option value="0278">0278</option>
                                    <option value="0279">0279</option>
                                    <option value="0281">0281</option>
                                    <option value="0282">0282</option>
                                    <option value="0283">0283</option>
                                    <option value="0284">0284</option>
                                    <option value="0285">0285</option>
                                    <option value="0286">0286</option>
                                    <option value="0287">0287</option>
                                    <option value="0288">0288</option>
                                    <option value="0289">0289</option>
                                    <option value="0291">0291</option>
                                    <option value="0292">0292</option>
                                    <option value="0293">0293</option>
                                    <option value="0294">0294</option>
                                    <option value="0295">0295</option>

                                </select>
                            </div>
                            <div class="col-md-7">
                                <input type="number" name="tlf_medic" id="tlf_medic" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>
                        
                        <div class="action">
                            <input type="submit"  class="btn btn-primary" id="registrar" value="Registrar" >
                            
                        </div> 
                        
                        
                    </form>
<script>
$(document).ready(function() {
            $("select").select2();
            $("#registrar_medicos").validate({
                rules: {
                    nom_medic : {
                            required: true,
                            minlength: 2
                    },
                    apel_medic : {
                            required: true,
                            minlength: 2
                    },
                    espc_medic : {
                            required: true,
                    },
                    fn_medic : {
                            required: true,
                            
                    },
                    dir_medic : {
                            required: true,
                    },
                    mail_medic : {
                            required: true,
                            email: true
                    },
                    tlf_medic : {
                            required: true,
                            number: true,
                            minlength: 7,
                            maxlength: 7,
                    },
                },
                messages: {
                    nom_medic:{                            
                            required: 'el campo es requerido',
                            minlength: 'minimo 2 caracteres'
                    },
                    apel_medic:{                            
                            required: 'el campo es requerido',
                            minlength: 'minimo 2 caracteres'
                    },
                    espc_medic:{                            
                            required: 'el campo es requerido',
                    },
                    fn_medic:{                            
                            required: 'el campo es requerido',
                            
                    },
                    dir_medic:{                            
                            required: 'el campo es requerido',
                    },
                    mail_medic:{                            
                            required: 'el campo es requerido',
                             email: 'debe ser un correo'
                    },
                    tlf_medic:{                            
                            required: 'el campo es requerido',
                            number: 'solo numeros',
                            minlength: 'minimo 7 numeros',
                            maxlength:'maximo 7 numeros',
                    },
                },
            });
});

</script>
<style type="text/css">
    
#from_user label.error {
        margin-left: 10px;
        width: auto;
        display: inline;
    }

    .error {
        text-decoration-color: red;
        color: red;
    } 
</style>

<?php
}//fin if registra medico

else{ 
    
    print ("<script>alert('El medico con la cedula:$ci_medic ya esta Registrado');</script>");

     }

} //fin if _POST

?>