function eliminarPrc(idCs,idDc){


  $.ajax({
    method: 'POST',
    url: 'controller/eliminarProcedimiento.php',
    data: { id: idCs, idD: idDc},
    beforeSend: function(){},
    success: function(res){
    
    swal({
        title: "Eliminado Procedimientto!",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },location.reload.bind(location));

    }
  });

}


function btnDeletePrc(idC,idD){
swal({
  title: "Estas seguro?",
  text: "No podrás recuperar este dato!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si, borralo!",
  closeOnConfirm: false
},
function(){

eliminarPrc(idC,idD);
  
});

}