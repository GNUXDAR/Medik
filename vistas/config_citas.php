<?php  
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: ../index.php");
    }
        include_once('../config/config.php');
        include_once('sidebar.php');
        include_once('script.php');
        
        $sql="SELECT * FROM  config_cita order by id_config desc";
        $conectando = new Conection();
        $query = pg_query($conectando->conectar(), $sql) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
        $resul = pg_fetch_all($query);
        $i = 1; 
?>  
    <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>Opciones De Configuración Citas</h3></br>
                
            </div>

            <div class="row">
	            <div class="col-md-12">
	    
				    <div class="tabbable tabs-left">
				        <ul class="nav nav-tabs">
				            <li class="active"><a href="#precio" data-toggle="tab"><i class="icon-money"></i> Precio</a></li>
				            <li><a href="#numero" data-toggle="tab"><i class="">#</i> Número</a></li>
				           <!--  <li><a href="#three-left" data-toggle="tab"><i class="fa fa-tint"></i> </a></li>
				            <li><a href="#four-left" data-toggle="tab"><i class="fa fa-users"></i> </a></li> -->
				        </ul>

				        <div class="tab-content">
				            <div class="tab-pane active" id="precio">
				               <br>
          						<div class="row">
          							<form class="form-horizontal" method="POST" action="../control/config_cita.php" autocomplete="off">
                    					 <label >Definir Nuevo Precio de pago de la Cita</label>
			                          	<div class="form-group">			                               
			                                <div class="col-md-4">
			                                         <input name="precio_cita" id="precio_cita" class="form-control" required type="number" placeholder="1000" autofocus>
			                                </div>
			                         	</div>									
			                        	<div class="action">
			                            	<input type="submit"  class="btn btn-primary" id="guardar_precio_cita" name="guardar_precio_cita" value="Guardar" >
			                            	<a href="principal.php" class="btn btn-default">Cancelar</a>
			                        	</div>		                        
			                    	</form>
          						</div><br><hr><br>
          						<div class="row">
          								<div class="col-md-8">
	          								<h4>Precios de la Cita</h4><br>
	          								<table class="table table-condensed table-striped table-hover dataTable">
	          									
	          									<thead>
	          										<tr>
	          											<th>#</th>
	          											<th>Precio</th>
	          											<th>Fecha</th>
	          											<th>Status</th>
	          										</tr>
	          									</thead>
	          									<tbody>
	          										<?php 
	          											foreach ($resul as $value) {
	          										?>
	          										<tr>
	          											<td><?php echo $i++; ?></td>
	          											<td><?php echo $value['precio_cita']; ?></td>
	          											<td><?php echo $value['fecha_config']; ?></td>
	          											<td><?php echo ($value['status'] == '1') ? '<span class="label label-success">Activo</span>' : '<span class="label label-default">Vencido</span>'  ; ?>  </td>
	          										</tr>
	          										<?php } ?>	          									</tbody>
	          								</table>
          								</div>
          							
          						</div>
				                
				            </div>

				            <div class="tab-pane" id="numero">
				               <br>
				                <div class="row">
					              <div class="col-md-6">
					                  <label for="">Número Actual de Citas</label>
					                  	<?php echo numeroCitas; ?>
					              </div>
          						</div><br><br>

          						<form class="form-horizontal" method="POST" action="../control/config_cita.php" autocomplete="off">
                    
			                          <div class="form-group">
			                                <label class="col-md-1">Número:</label>
			                                <div class="col-md-4">
			                                         <input name="numero_cita" id="numero_cita" class="form-control" required type="number" placeholder="1000" autofocus>
			                                </div>
			                        </div>
									
			                        <div class="action">
			                            <input type="submit"  class="btn btn-primary" name="guardar_numero_cita" id="guardar" value="Guardar" >
			                            <a href="principal.php" class="btn btn-default">Cancelar</a>
			                            
			                        </div> 
			                        
			                        
			                    </form>
				                
				            </div>

				          <!--   <div class="tab-pane" id="three-left">
				                
				            </div>

				            <div class="tab-pane" id="four-left">
				                
				            </div> -->
				        </div>
				    </div>
				</div>
			</div> 
        </div>
        
            
        </div>

     
    </div>
