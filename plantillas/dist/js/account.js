//if((location.href).lastIndexOf('account')!=-1){
$('#modal-deposito-moneda').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var currency = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Depósito ' + currency)      
});

$('#modal-deposito-cripto').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var currency = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('Depósito ' + currency)  
});

/*
$('#modal-retiro-cripto').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var currency = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('Retiro en ' + currency)  
});

*/

$('#btn-retiro-btc').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en BTC');
  $('#modal-retiro-cripto').modal('show');
  //$('#submit-cripto').val('add');
});

$('#btn-retiro-eth').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en ETH');
  $('#modal-retiro-cripto').modal('show');
  $('#submit-cripto').val('add');
});

$('#btn-retiro-ltc').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en LTC');
  $('#modal-retiro-cripto').modal('show');
  $('#submit-cripto').val('add');
});

$('#btn-retiro-xmr').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en XMR');
  $('#modal-retiro-cripto').modal('show');
  $('#submit-cripto').val('add');
});

$(document).on('submit', '#form-retiro-cripto', function(event) {
  event.preventDefault();
  /* Act on the event */
  var id = $('#item-id').val(data.id); //id de la tabla de usuarios para recuperar el user y pass en el modelo
  var address = $('#item-address').val();
  var monto = $('#item-monto').val();
  var fee = $('#item-fee').val();
  var recibe = $('#item-recibe').val();
  
    if($('#submit-cripto').val() == "add"){
      // console.log('add ra');
      $.ajax({
          url: '<?= base_url()?>account/retirarCripto.php',
          type: 'post',
          dataType: 'json',
          data: {
            id:id,
            address:address,
            monto:monto,
            fee:fee,
            recibe:recibe
          },
          success: function (data) {
            console.log(data);
            if(data.valid == true){
              $('#modal-message').find('#msg-body').text(data.msg);
              $('#modal-item').modal('hide');
              //ActualizarTranzacciones();
              $('#modal-message').modal('show');
              $('#submit-item').val('null');
            }
          },
          error: function(){
            eMsg('70');
          }//
        });
    }//end if == "add"
});