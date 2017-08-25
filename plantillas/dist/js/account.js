
function eMsg(params){
  alert("Error: "+params);
}//end eMsg

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

$('#btn-retiro-btc').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en BTC');
  $('#modal-retiro-cripto').modal('show');
  $('#submit-cripto').val('btc');
});

$('#btn-retiro-eth').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en ETH');
  $('#modal-retiro-cripto').modal('show');
  $('#submit-cripto').val('eth');
});

$('#btn-retiro-ltc').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en LTC');
  $('#modal-retiro-cripto').modal('show');
  $('#submit-cripto').val('ltc');
});

$('#btn-retiro-xmr').click(function(event) {
  /* Act on the event */
  $('#modal-retiro-cripto').find('.modal-title').text('Retiro en XMR');
  $('#modal-retiro-cripto').modal('show');
  $('#submit-cripto').val('xmr');
});

$(document).on('submit', '#form-retiro-cripto', function(event) {
  event.preventDefault();
  /* Act on the event */
  //var id = $('#item-id').val(data.id); //id de la tabla de usuarios para recuperar el user y pass en el modelo
  var email = Session["email"];
  var address = $('#item-address').val();
  var monto = $('#item-monto').val(); //$this->session->userdata('email')
  var fee = $('#item-fee').val();
  var recibe = $('#item-recibe').val();
  
  if($('#submit-cripto').val() == "btc"){
    $.ajax({
        url: '<?= base_url()?>account/retirarCripto.php',
        type: 'post',
        dataType: 'json',
        data: {
          email:email,
          address:address,
          monto:monto,
          fee:fee,
          recibe:recibe
        },
        success: function (data) {
          console.log(data);
          if(data.valor == true){
            $('#modal-mensaje').find('#msg-body').text(data.msg);
            $('#modal-retiro-cripto').modal('hide');
            //ActualizarTranzacciones();
            $('#modal-mensaje').modal('show');
            $('#submit-cripto').val('null');
          }
        },
        error: function(){
          eMsg('Transaccion fallida!');
        }//
      });
  }//end if == "btc"
});

/*
function showAllTransaction()
{
  $.ajax({
      url: 'account/transacion',
      success: function (data) {
        $('#all-item').html(data);
      },
      error: function(){
        alert('Error: L42+');
      }
    });
}//end showAllItem
showAllTransaction();
*/
