<?php  //modulo de session
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }
    include_once('../control/conexion.php');
    include_once('sidebar.php');
    include_once('script.php');

?>

  <div class="content">
        <div id="pad-wrapper" class="form-page"> 
        
        <div class="row">
            <div class="col col-md-3"></div>
        	<div class="col col-md-6">
                <h2 align="center">Reportes</h2></br></br>
                <div class="field-box">
            	<label >Reporte de Pacientes por:</label>
            	<label class="select">
	            
	               <select name="select_reporte" id="select_reporte" class="form-control">
	               	<option value="" selected>Seleccione</option>
	               	<option value="1" > Edad</option>
	               	<option value="2" > Sexo</option>
	               	<option value="3" > Enfermedad</option>
	               	<option value="4" > Asisten al mes</option>
	               	<option value="5" > Asisten a la semana</option>
	               </select>
            	</label>

                <button id="button_reporte" class="btn btn-primary">Generar</button>
                </div>
        	</div>

        	<div class="col col-md-3"></div>
        </div>
        <br>    <br>          
        <div class="row">
        	<div id="reporte"></div>
        </div>      
        <div id="pdf"></div>
  
</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		
		$("#button_reporte").click(function (e) {
			var reporte = $("#select_reporte").val();
			if (reporte == "") {
				alert("<- Selecione uno");
            	$("#select_reporte").focus();
			}else{
					$.ajax({
                    url: "generar_reportes.php",
                    type : 'POST',
                    data: { reporte : reporte },
                    success:
                        function (data) {
                            if (data == 0) {
                                alert("Error al procesar la operacion!.");
                            }else{
                                 $("#reporte").empty().html(data);
                            }
                           
                        }
                	});
			}
		});
	});
</script>

<script type="text/javascript">
	function descargar_pdf() {
		
		var titilu_grafica = "";
		var nombre_archivo = "";
		if ($("#select_reporte").val() == 1) {
				titilu_grafica = "Reporte de pacientes por Edades";
				nombre_archivo = "reporte de pacientes por edades";
		}
		$.ajax({
                    url: "reporte_pdf.php",
                    type : 'POST',
                    data: { 
                    		titilu_grafica : titilu_grafica,
                    		nombre_archivo : nombre_archivo
                    	  },
                    success:
                        function (data) {
                               $("#pdf").html(data);                      
                        }
        });
		
	}
</script>
