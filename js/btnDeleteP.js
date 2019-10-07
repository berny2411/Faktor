function eliminarP(idAs){

  parametros ={ "id": idAs }
  $.ajax({
    method: 'POST',
    url: 'controller/eliminarPaciente.php',
    data: parametros,
    beforeSend: function(){},
    success: function(){
    
    swal("Eliminado!", "El dato ha sido eliminado", "success");
    }
  });

}


function btnDeleteP(id){
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

eliminarP(id);
  
});

}


