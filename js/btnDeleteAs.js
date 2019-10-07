function eliminarA(idAs){

  parametros ={ "id": idAs }
  $.ajax({
    method: 'POST',
    url: 'controller/eliminarAseguradora.php',
    data: parametros,
    beforeSend: function(){},
    success: function(res){
    
    swal({
        title: "Eliminado Aseguradora!",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },location.reload.bind(location));

    }
  });

}


function btnDeleteA(id){
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

eliminarA(id);
  
});

}

function eliminarMA(idAs,idU){

  parametros ={ id: idAs , idUs: idU }
  $.ajax({
    method: 'POST',
    url: 'controller/eliminarMA.php',
    data: parametros,
    beforeSend: function(){},
    success: function(res){
    
    swal({
        title: "Eliminado Aseguradora!",
        text: res,
        type: "success",
        confirmButtonText: "Ok",
        closeOnConfirm: false
      },location.reload.bind(location));

    }
  });

}


function btnDeleteMA(idA,idUS){
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

eliminarMA(idA,idUS);
  
});

}


