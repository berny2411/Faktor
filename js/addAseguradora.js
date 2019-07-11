$('#alta').click(function(){

  var form = $('#alta_Aseguradora').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altaAseguradora.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios, por favor llena el nombre aseguradora, direccion y link', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        window.location.href = res ;
      }


    }
  });

});

$('#update').click(function(){

  var form = $('#update_Aseguradora').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/updateAseguradora.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios, por favor llena el nombre Aseguradora, direccion y link', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        window.location.href = res ;
      }


    }
  });

});




