<?php 

if($_POST){  //inicio if _POST

$ci_pacnt = $_POST['ci_pacnt'];

$buscarPersona="SELECT * FROM pacnt_cnslt WHERE ci_pacnt='$ci_pacnt'";
$conectando = new Conection();

$verificaPersona = pg_query($conectando->conectar(), $buscarPersona) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
$localizarPersona=pg_num_rows($verificaPersona);


    if ($localizarPersona == 0){  //inicio if registrar paciente

        $ATRIBUTO=pg_fetch_array($verificaPersona);

        echo '<div class="row">
        <div class="col-md-7"> <b class="text-info">Registrando Nuevo Paciente</b></div>
         </div> <hr>';



         echo '
                        
                    <form method="POST" action="../control/reg_paciente.php" autocomplete="off">
                    <input value="'.$ci_pacnt.'" name="ci_pacnt" id="ci_pacnt" class="form-control" required type="hidden" min="00000000" max="99999999" placeholder="12345678" autofocus>

                        <div class="field-box">
                            <label>Nombres Paciente:</label>
                            <div class="col-md-7">
                                <input title="Nombre Paciente" name="nom_pacnt" id="nom_pacnt" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text" autofocus>
                            </div>                            
                        </div>

                        <div class="field-box">
                            <label>Apellidos Paciente:</label>
                            <div class="col-md-7">
                                <input title="Apellido del Paciente" name="apel_pacnt" id="apel_pacnt" class="form-control" type="text" placeholder="Ingrese Aqui" required type="text">
                            </div>                            
                        </div>
                        
                        <div class="field-box">
                            <label>Sexo:</label>
                            <div class="col-md-4">
                            <select class="form-control" name="sexo_pacnt">
                                <option value="Masculino" >Masculino</option>
                                <option value="Femenino" >Femenino</option>
                            </select>
                            </div>
                        </div>


                        <div class="field-box">
                            <label>Fecha de Nacimiento:</label>
                            <div class="col-md-4">
                                <input title="Fecha del Paciente" name="fn_pacnt" id="fn_pacnt" class="form-control" type="text" placeholder="Click Aqui" required type="text">

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
                                <input title="Direccion del Paciente" type="text" name="dir_pacnt" id="dir_pacnt" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>

                        <div class="field-box">
                            <label>Correo:</label>
                            <div class="col-md-7">
                                <input title="Correo del Paciente" type="text" name="mail_pacnt" id="mail_pacnt" class="form-control" placeholder="
                                @" required>
                            </div>
                        </div>

                        
                        <div class="field-box">
                            <label>Num Telefono:</label>
                            <div class="col-md-2">
                                <select name="tlf_pacnt2" id="tlf_pacnt2" class="form-control">
                                    <option value="0412" name="0412">0412</option>
                                    <option value="0414" name="0414">0414</option>
                                    <option value="0424" name="0424">0424</option>
                                    <option value="0416" name="0416">0416</option>
                                    <option value="0426" name="0426">0426</option>

                                </select>
                            </div>
                        
                        
                            <div class="col-md-5">
                            
                                <input type="number" name="tlf_pacnt" id="tlf_pacnt" class="form-control" placeholder="Ingrese Aqui" required>
                            
                            </div>
                        </div>
                       
                        
                        <div class="action">
                            <input type="submit"  class="btn btn-primary" id="registrar" value="Registrar" >
                            
                        </div> 
                        
                        
                    </form>';


}//fin if registra paciente

else{ 
    
    print ("<script>alert('El paciente con la cedula:$ci_pacnt ya esta Registrado');</script>");

     }

} //fin if _POST

?>