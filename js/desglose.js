$('#editarPro').click(function(){
 var form = $('#desgloceDatosProcedimiento').serialize();
  //   swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
   document.getElementById("siniestro").disabled = false;
  // document.getElementById("fecha").disabled = false;
   document.getElementById("descripcion").disabled = false;
   document.getElementById("rol").disabled = false;
   document.getElementById("honorario").disabled = false;
  });

$('#editarMed').click(function(){
 var form = $('#desgloseMedico').serialize();
  //   swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');

   document.getElementById("correoUser").disabled = false;
   document.getElementById("nombreUser").disabled = false;
   document.getElementById("apellidoUser").disabled = false;
   document.getElementById("direccionUser").disabled = false;
   document.getElementById("telefonoUser").disabled = false;
   document.getElementById("cuentaUser").disabled = false;
   document.getElementById("bancoUser").disabled = false;
   document.getElementById("rfcUser").disabled = false;
  });



$('#editarPac').click(function(){
 var form = $('#desglosePaciente').serialize();
  //   swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');

   document.getElementById("nombrePaciente").disabled = false;
   document.getElementById("apellidoPaciente").disabled = false;
   document.getElementById("hospital").disabled = false;
   document.getElementById("cuarto").disabled = false;
   document.getElementById("telefono").disabled = false;
   document.getElementById("emailPac").disabled = false;
  });

/*******************************************************************************************/
$('#guardarPro').click(function(){

  var form = $('#desgloceDatosProcedimiento').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/updateProcedimiento.php',
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
        swal('Registrado', res);
       // window.location.href = res ;
      }


    }
  });

});




$('#guardarPac').click(function(){

  var form = $('#desglosePaciente').serialize();

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
        swal('Error', 'Campos obligatorios, por favor llenar los campos nombre, apellidos ', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        swal('Registrado', res);
       // window.location.href = res ;
      }


    }
  });

});