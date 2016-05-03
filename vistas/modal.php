<div id="modal_cita" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cita de <span id="title_cita"></span></h4>
      </div>
      <div class="modal-body" id="modal_body_cita">
          
          <div class="row">
              <div class="col-md-6">
                  <label for="">Fecha de Ingreso</label>
                  {{$personal->fecha_ingreso}}
              </div>
          </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
