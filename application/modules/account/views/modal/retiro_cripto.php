 <div class="modal modal-info fade" id="modal-retiro-cripto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Retiro en</h4>
        </div>
        <div class="modal-body">
          
          <form  role="form" id="form-retiro-cripto">
            <input type="hidden" id="item-id" value="4">
            <div class="row">

              <div class="col-sm-6"">
                <div class="form-group">
                  <h4>Fondo Disponible</h4>
                  <h3>332 BTC</h3>
                </div>

                <div class="form-group">
                </div>

                <div class="form-group">
                  <h4>Importante</h4>
                  <ul>
                    <li>Monto mínimo para retirar: 0.002 BTC.</li>
                    <li>El cargo por retiro: 0.15% BTC.</li>
                    <li>Límite diario de retiro: 3BTC.</li>
                  </ul>                  
                </div>
                
              </div>

              <div class="col-sm-6"">
                <div class="form-group">
                  <label for="item-address" class="form-control-label">Dirección</label>
                  <input type="text" class="form-control" id="item-address" placeholder="Dirección de la Billetera" required="" autofocus="">
                </div>
                <div class="form-group">
                  <label for="item-monto" class="form-control-label">Monto de Retiro</label>
                  <input type="text" class="form-control" id="item-monto" placeholder="Cantidad" required="" autofocus="" value="0.0018">  
                </div>
                <div class="form-group">
                  <label for="item-fee" class="form-control-label">Fee</label>
                  <input type="text" class="form-control" id="item-fee" disabled value="0.0003">  
                </div>
                <div class="form-group">
                  <label for="item-recibe" class="form-control-label">Recibirá</label>
                  <input type="text" class="form-control" id="item-recibe" disabled value="0.0015">  
                </div>

                <div class="form-group">
                  <!--button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnCerrarModal">Cerrar</button-->
                  <button type="submit" id="submit-cripto" value="add" class="btn btn-default pull-right">Enviar</button>
                </div>
              </div>
              
            </div>                   
          </div>

        </form>
        <div class="modal-footer">
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>