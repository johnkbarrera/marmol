<div class="modal modal-info fade" id="modal-deposito-moneda">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Depósito en</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="form-control-label" for="bancos">Nombre del Banco</label>
                        <select class="form-control" id="bancos" style="width: 100%;">
                            <option selected="selected">Seleccionar</option>
                            <option>Interbank</option>
                            <option>BBVA Continental</option>
                            <option>Banco de la Nacion</option>
                            <option>BCP</option>
                            <option>Scotiabank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="cantidad">Cantidad</label>
                        <input class="form-control" id="cantidad" placeholder="Cantidad" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="comision">Comisión</label>
                        <input class="form-control" disabled="" id="comision" type="text" value="0.01">
                        </input>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="total">Total</label>
                        <input class="form-control" disabled="" id="total" type="text" value="0">
                        </input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline pull-left" data-dismiss="modal" type="button">Cerrar</button>
                <button class="btn btn-outline" type="button">Ingresar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
