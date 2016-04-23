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
?>
  <div class="content">
        <div id="pad-wrapper" class="form-page"> 
        <h3>Nuevo Usuario</h3> <br>


       <form method="POST" class="form-horizontal" action="../control/reg_user.php" autocomplete="off">
                       
                        <div class="form-group">
                                <label class="control-label col-xs-2">Nombre:</label>
                                <div class="col-md-7">
                                         <input name="nombre_usr" id="nombre_usr" class="form-control" required type="text" placeholder="Jose" autofocus>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-xs-2">Apellido:</label>
                                <div class="col-md-7">
                                         <input name="apellido_usr" id="apellido_usr" class="form-control" required type="text" placeholder="Perales" >
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-xs-2">Cedula:</label>
                                <div class="col-md-7">
                                         <input name="ci_usr" id="ci_usr" class="form-control" required type="numeric" min="00000000" max="99999999" placeholder="12345678" >
                                </div>
                        </div>

                        

                       <div class="form-group">
                            
                            <label class="control-label col-xs-2">Nombre de Usuario:</label>
                            <div class="col-md-7">
                                <input name="login_usr" id="login_usr" class="form-control" type="text" placeholder="user1" required type="text">
                            </div>
                            <div class="col-md-2">
                                verificar
                            </div>                           
                        </div>

                        <div class="form-group">
                            
                            <label class="control-label col-xs-2">Tipo de Usuario:</label>
                            <div class="col-md-7">
                               <label class="select">
                               <select  name="tipo_usr" class="form-control" id="tipo_usr" required>
                                        <option value="">Seleccine</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Secretaria</option>                                 
                               </select>
                               </label>
                            </div>                                                  
                        </div>


                        <div class="form-group">
                            <label class="control-label col-xs-2">Contraseña:</label>
                            <div class="col-md-7">
                                <input type="password" name="pass_usr" id="pass_usr" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-2">Repetir Contraseña:</label>
                            <div class="col-md-7">
                                <input type="password" name="re_pass_usr" id="re_pass_usr" class="form-control" placeholder="Ingrese Aqui" required>
                            </div>
                        </div>
                        
                        <div class="action">
                            <input type="submit"  class="btn-flat" id="registrar" value="Registrar" >
                            
                        </div> 
                        
                        
                    </form>
        
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#registrar").click(function(event) {
         if ( $("#re_pass_usr").val() == $("#pass_usr").val() ) {

         }else{
            event.preventDefault();
            alert("Las contraseñas no son iguales!");
            $("#re_pass_usr").val('');
            $("#pass_usr").val('');
            $("#pass_usr").focus();
         }
         
    });
 

    $("#").click(function() {
        var login_usr = $("#login_usr").val();
    
        $.ajax({
                url: "buscar_login.php",
                type : 'POST',
                data: { 
                        login_usr : login_usr
                      },
                success:
                        function (data) {
                                                        
                        }
        });
    });




});


</script>