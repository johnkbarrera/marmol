<div class="modal modal-info fade" id="modal-deposito-cripto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Depósito en</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                            
                            <img src='https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=<?php echo $address;?>&chld=L|0'>
                        </div>
                        <div align="justify" class="col-sm-6">
                            <p>La mínima cantidad de depósito es de 0.0001 BTC.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <br><br>
                            <h3><kbd> <?php echo $address; ?></kbd></h3>
                            </br></br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline pull-right" data-dismiss="modal" type="button">Cerrar</button>
                <!--button type="button" class="btn btn-outline">Ingresar</button-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>