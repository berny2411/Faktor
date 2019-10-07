$('button[id=descarga1]').on('click',function () {
  var service = $(this).data("id");
  var idD=document.getElementById("link").value;

  $.ajax({
    type: "POST",
    url: "controller/descargar.php",
    data: {id:service,link: idD},
    success: function(res) {
      if(res==true) { 
        swal({
          title: "Eliminado",
          text: "Exitoso",
          type: "success",
          confirmButtonText: "Ok",
          closeOnConfirm: false
        },location.reload.bind(location));
      } else{

        swal("Advertencia","exito");
      }
    }
  });
});

$('button[id=descarga2]').on('click',function () {
  var service = $(this).data("id");
  var dataString = 'id='+service;

  $.ajax({
    type: "POST",
    url: "controller/descargar.php",
    data: dataString,
    success: function(res) {
      if(res==true) { 
        swal({
          title: "Eliminado",
          text: res,
          type: "success",
          confirmButtonText: "Ok",
          closeOnConfirm: false
        },location.reload.bind(location));
      } else{

        swal("Advertencia",res);
      }
    }
  });
});

$('button[id=descarga3]').on('click',function () {
  var service = $(this).data("id");
  var dataString = 'id='+service;

  $.ajax({
    type: "POST",
    url: "controller/descargar.php",
    data: dataString,
    success: function(res) {
      if(res==true) { 
        swal({
          title: "Eliminado",
          text: res,
          type: "success",
          confirmButtonText: "Ok",
          closeOnConfirm: false
        },location.reload.bind(location));
      } else{

        swal("Advertencia",res);
      }
    }
  });
});