
$('#altaMedico').click(function(){

  var form = $('#altaMedico1').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altaMedico.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){

      if(res ==1){
        swal('Error', 'Campos obligatorios: RFC', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
       swal({
        title: "Registrado",
        text: 'Exitoso',
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },);
  $('#smartwizard').smartWizard("next");
                return true;

     }


   }
 });
});

$('#myperfil').click(function(){

  var form = $('#perfil').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altaMedico.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios', 'warning');
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
      },location.reload.bind(location));
     }


   }
 });

});

$('#altaMedicoB2').click(function(){

  var form = $('#altaMedicoB3').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/altaMedicoB.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 1){
        swal('Error', 'Campos obligatorios', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        swal({
          title: "Registrado Datos Bancarios",
          text: res,
          type: "success",
          confirmButtonText: "Ok",
          closeOnConfirm: false
        },);
        $('#smartwizard').smartWizard("next");
                return true;
      }


    }
  });

});

$('#updateUsuario2').click(function(){

  var form = $('#update_Usuario').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/updateUsuario.php',
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

        var valor = document.getElementById("x").value;


        swal({
          title: "Modificado",
          text: valor,
          type: "success",
          confirmButtonText: "Ok",
          closeOnConfirm: false
        });
        window.location.href = "./admin.php?page=usuario/modificarUsuario2&id="+valor;
         // <a href="./admin.php?page=usuario/modificarUsuario&id=<?php echo valor ?>"
           //title="Editar Usuario: <?php echo $key['nombreUsuario'] ?>">


         }


       }
     });

});

$('#updateUsuario3').click(function(){

  var form = $('#update_Usuario2').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/updateUsuario2.php',
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
       var valor = document.getElementById("x").value;
       swal({
        title: res,
        text: valor,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      });
       
     }


   }
 });

});



