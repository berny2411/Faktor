$('#cambiarStatus').click(function(){

var form = $('#StatusProcedimiento').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/statusProcedimiento.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();
	swal({
        title: "Status Cambiado",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },);
      

    }
  });

});


$('#btnFinalizarCaso').click(function(){
var num=5;
  $.ajax({
    method: 'POST',
    url: 'controller/validacionProcedimiento.php',
    data: {status:num},
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();
  swal({
        title: "Procedimiento validado",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },);
      

    }
  });

});