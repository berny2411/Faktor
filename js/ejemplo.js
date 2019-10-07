$("#navegar").click(function() {
     var idD=document.getElementById("valorD").value;
  $.ajax({
    method: 'POST',
    url: 'vistaDocumentosAC.php',
    data: {idD2: idD},
    beforeSend: function(){

    },
    success: function(res){
      window.location.href='medico.php?page=documentos/vistaDocumentosAC';
    }
  });

});


