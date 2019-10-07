
$('#altaMS').click(function(){

  var form = $('#alta_MedicoAs').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altamedAs.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios, por favor llena el nombre aseguradora, direccion y link', 'warning');
      }else if(res == 'enviado'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        swal({
        title: "Registro Aseguradora",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },location.reload.bind(location));
      }


    }
  });

});

$('#altaMS2').click(function(){

  var form = $('#alta_MedicoAs2').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altamedAs.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', ' Por favor selecciona una aseguradora', 'warning');
      }else if(res == 'enviado'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        swal({
        title: "Registro Aseguradora",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      }, $('#smartwizard').smartWizard("next"));         
      }
    }
  });

});