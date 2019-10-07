$('#altaP').click(function(){

  var form = $('#alta_Paciente').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altaPaciente.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios, por favor llenar los campos nombre, apellidos ', 'warning');

      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
     
      swal({
        title: "Registrado",
        text: "Paciente",
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },$("#alta_Paciente")[0].reset()
      );
   
 $.get( "views/procedimiento/tab2.php", function( data ) {
  $('#newPaciente').html(data);
});
  
  $('#pills-home-tab3').removeClass('active').attr("aria-selected",'false');
  $('#pills-home3').removeClass('active show');
  $('#pills-home-tab2').addClass('nav-link active').attr("aria-selected",'true');
  $('#pills-home2').addClass('nav-link active show');

      }


    }
  });

});




$('#altaC').click(function(){

  var form = $('#alta_Caso').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altaProcedimiento.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 1){

        swal('Error', ' Todos los campos son obligatorios', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        swal({
        title: "Registrado",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },$("#alta_Caso")[0].reset());
        
        $('#pills-contact-tab2').removeClass('disabled');
        $('#pills-home-tab2').removeClass('active').attr("aria-selected",'false');
        $('#pills-home2').removeClass('active show');
        $('#pills-profile-tab2').addClass('nav-link active').attr("aria-selected",'true');
        $('#pills-profile2').addClass('nav-link active show');

       
      }


    }
  });

});






$('#updateP').click(function(){

  var form = $('#update_Paciente').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/updatePaciente.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios, por favor llena el nombre nombre y apellidos', 'warning');
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