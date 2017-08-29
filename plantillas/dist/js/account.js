
function eMsg(params){
  alert("Error: "+params);
}//end eMsg



//$(document).ready(function(){
//function calcular_btc_recibe() {
function calcular_btc_recibe() {

  var monto=parseFloat(document.getElementById('item-monto').value);
  var fee=parseFloat(document.getElementById('item-fee').value);

  if (isNaN(monto)) {monto=0;}
  if (isNaN(fee)) {fee=0;}

  var recibe=monto-fee;
  if (recibe>=0) {    
    document.getElementById('item-recibe').value=recibe.toPrecision(5)
    //$('#item-recibe').val(recibe.toPrecision(5));
  }else{
    document.getElementById('item-recibe').value=0;
    //$('#item-recibe').val(recibe.toPrecision(5));
  }
  

/* 
  $('#form-retiro-cripto').on('change', '#item-monto, #item-fee', function() {
    var monto = $('#item-monto').val();
    var fee = $('#item-fee').val();

    if (isNaN(monto)) {monto = 0;}
    if (isNaN(fee)) {fee = 0;}

    recibe=monto-fee;

    $('#item-recibe').val(recibe.toPrecision(5));
  });
*/
    
//}
/* Act on the event */
};


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

//console.log($("#item-id").val());
var base_url = window.location.origin+'/marmol/';
//console.log(base_url);

$(document).on('submit', '#form-retiro-cripto', function(event) {
  event.preventDefault();
  
  var email = $("#item-id").val();
  var address = $('#item-address').val();
  var monto = $('#item-monto').val(); //$this->session->userdata('email')
  var fee = $('#item-fee').val();
  var recibe = $('#item-recibe').val();

  if($('#submit-cripto').val() == "btc"){

    $.ajax({
        url: base_url+'account/transferir_btc',
        type: 'post',
        dataType: 'json',
        data: {
          email:email,
          address:address,
          monto:monto,
          fee:fee,
          recibe:recibe
        }
      }).done(function( data ) {

        switch(data['estado']) {
            case 1:
                $("#modal-mensaje").removeClass("modal-warning");  
                $("#modal-mensaje").addClass("modal-success");
                $('#modal-mensaje').find('#modal-title').text("Transacción exitosa!");
                $('#modal-mensaje').find('#msg-body').html(data['msg']);
                $('#modal-retiro-cripto').modal('hide');
                //ActualizarTranzacciones();
                $('#modal-mensaje').modal('show');
                $('#submit-cripto').val('null');
                break;

            case 2:                
                $('#modal-mensaje').find('#modal-title').text("Transacción Fallida");
                $('#modal-mensaje').find('#msg-body').text("Ingrese un valor correcto.");   
                $('#modal-retiro-cripto').modal('hide');               
                //ActualizarTranzacciones();
                $('#modal-mensaje').modal('show');
                $('#submit-cripto').val('null');
                break;

            case 3:                                
                $('#modal-mensaje').find('#modal-title').text("Transacción Fallida");
                $('#modal-mensaje').find('#msg-body').text("No cuenta con suficientes fondos.");   
                $('#modal-retiro-cripto').modal('hide');                 
                //ActualizarTranzacciones();
                $('#modal-mensaje').modal('show');
                $('#submit-cripto').val('null');
                break;

            case 4:
                
                $('#modal-mensaje').find('#msg-body').text("New Error: ");    
                $('#modal-retiro-cripto').modal('hide');                
                //ActualizarTranzacciones();
                $('#modal-mensaje').modal('show');
                $('#submit-cripto').val('null');
                break;
        }              
   
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
