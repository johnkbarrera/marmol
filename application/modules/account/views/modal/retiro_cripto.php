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
            <input type="hidden" id="item-id" name="item-id" value="<?php echo $email;?>">
            <div class="row">

              <div class="col-sm-5"">
                <div class="form-group">
                  <h4>Fondo Disponible</h4>
                  <h3><?= $balance ?> BTC</h3>
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

              <div class="col-sm-7"">
                <div class="form-group">
                  <label for="item-address" class="form-control-label">Dirección</label>
                  <input type="text" class="form-control" id="item-address" name='item-address' placeholder="Dirección de la Billetera" required="" autofocus="" value="18gofQ4RE63XZ546keAaGw43tzJgh6c821">
                </div>
                <div class="form-group">
                  <label for="item-monto" class="form-control-label">Monto de Retiro</label>
                  <input type="text" class="form-control monto" id="item-monto" name="item-monto" placeholder="Cantidad" required="" autofocus="" value="0" oninput="calcular_btc_recibe();" minlength="0" maxlength="12"> 
                </div>
                <div class="form-group">
                  <label for="item-fee" class="form-control-label">Fee</label>
                  <input type="text" class="form-control monto" id="item-fee" name="item-fee" value="0.0001" disabled>  
                </div>
                <div class="form-group">
                  <label for="item-recibe" class="form-control-label">Recibirá</label>
                  <input type="text" class="form-control monto" id="item-recibe" name="item-recibe" disabled value="0">  
                </div>

                <div class="form-group">
                  <!--button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnCerrarModal">Cerrar</button-->
                  <button type="submit" id="submit-cripto" value="add" class="btn btn-outline pull-right"><span class="glyphicon glyphicon-send" aria-hidden="true"> Enviar</button>
                </div>
              </div>
              
            </div>                  
          

        </form> 
        </div>       
        <!--div class="modal-footer"></div-->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>