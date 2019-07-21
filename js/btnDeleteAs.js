function eliminarA(idAs){

  parametros ={ "id": idAs }
  $.ajax({
    method: 'POST',
    url: 'controller/eliminarAseguradora.php',
    data: parametros,
    beforeSend: function(){},
    success: function(){
    
    swal("Eliminado!", "El dato ha sido eliminado", "success");
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

