$('button[id=delete]').on('click',function () {
  var service = $(this).data("id");
  var dataString = 'id='+service;

  $.ajax({
    type: "POST",
    url: "controller/eliminarArchivo.php",
    data: dataString,
    success: function(res) {
      if(res==true) { 
        swal({
          title: "Eliminado",
          text: "El Archivo a sido eliminado",
          type: "success",
          confirmButtonText: "Ok",
          closeOnConfirm: false
        },location.reload.bind(location));
      } else{

        swal("Advertencia", "el archivo no a sido eliminado");
      }
    }
  });
});

