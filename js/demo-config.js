$(function(){
  /*
   
   * Por el bien de mantener el código limpio y los ejemplos simples de este archivo
   * contiene solo la configuración del complemento y las devoluciones de llamada.
   * *
   * Las funciones de la interfaz de usuario ui_ * se pueden ubicar en: demo-ui.js
   */
var num=1;
  $('#drag-and-drop-zone').dmUploader({ //

    url: 'controller/uploadP.php',
    multiple:false,
    maxFileSize: 3000000, // 3 Megs 
    allowedTypes: 'application/pdf',
    auto: false,
    queue: false,
    onDragEnter: function(){
      //Sucede al arrastrar algo sobre el área DnD
      this.addClass('active');
    },
    onDragLeave: function(){
      // Ocurre al arrastrar algo fuera del área DnD
      this.removeClass('active');
    },
    onInit: function(){
     // El complemento está listo para usar
    },
    onComplete: function(){
      // Todos los archivos en la cola se procesan (éxito o error)
    },
    onNewFile: function(id, file){
      swal('Archivo','En listado','success');
      // Cuando se agrega un nuevo archivo usando el selector de archivos o el área DnD
      ui_multi_add_file(id, file,num);
  $('#pills-home-tab').removeClass('active').attr("aria-selected",'false');
  $('#pills-home').removeClass('active show');
  $('#pills-profile-tab').addClass('nav-link active').attr("aria-selected",'true');
  $('#pills-profile').addClass('nav-link active show');
    },
    onBeforeUpload: function(id){
      // acerca de comenzar a cargar un archivo
      ui_multi_update_file_status(id, 'uploading', 'Uploading...');
      ui_multi_update_file_progress(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Ocurre cuando el usuario cancela directamente un archivo.
      ui_multi_update_file_status(id, 'warning', 'Archivo Cancelado');
      ui_multi_update_file_progress(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Actualización del progreso del archivo
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      // Un archivo se cargó correctamente
      ui_multi_update_file_status(id, 'success', 'Carga completa');
      ui_multi_update_file_progress(id, 100, 'success', false);


    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // Cuando el navegador no admite este complemento :(
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    }
  });

 

});



$(function(){
  /*
   
   * Por el bien de mantener el código limpio y los ejemplos simples de este archivo
   * contiene solo la configuración del complemento y las devoluciones de llamada.
   * *
   * Las funciones de la interfaz de usuario ui_ * se pueden ubicar en: demo-ui.js
   */
   var num=2;
  $('#drag-and-drop-zoneFiscal').dmUploader({ //
    url: 'controller/uploadP.php',
    multiple:false,
    maxFileSize: 3000000, // 3 Megs 
    allowedTypes: 'application/pdf',
    auto: false,
    queue: false,
    onDragEnter: function(){
      //Sucede al arrastrar algo sobre el área DnD
      this.addClass('active');
    },
    onDragLeave: function(){
      // Ocurre al arrastrar algo fuera del área DnD
      this.removeClass('active');
    },
    onInit: function(){
     // El complemento está listo para usar
    },
    onComplete: function(){
    },
    onNewFile: function(id, file){
      swal('Archivo','En listado','success');
      // Cuando se agrega un nuevo archivo usando el selector de archivos o el área DnD
      ui_multi_add_file(id, file,num);
  $('#pills-profile-tab').removeClass('active').attr("aria-selected",'false');
  $('#pills-profile').removeClass('active show');
  $('#pills-contact-tab').addClass('nav-link active').attr("aria-selected",'true');
  $('#pills-contact').addClass('nav-link active show');
    },
    onBeforeUpload: function(id){
      // acerca de comenzar a cargar un archivo
      ui_multi_update_file_status(id, 'uploading', 'Uploading...');
      ui_multi_update_file_progress(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Ocurre cuando el usuario cancela directamente un archivo.
      ui_multi_update_file_status(id, 'warning', 'Archivo Cancelado');
      ui_multi_update_file_progress(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Actualización del progreso del archivo
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      // Un archivo se cargó correctamente
      ui_multi_update_file_status(id, 'success', 'Carga completa');
      ui_multi_update_file_progress(id, 100, 'success', false);

  
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // Cuando el navegador no admite este complemento :(
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    }
  });
 
});


$(function(){
  /*
   
   * Por el bien de mantener el código limpio y los ejemplos simples de este archivo
   * contiene solo la configuración del complemento y las devoluciones de llamada.
   * *
   * Las funciones de la interfaz de usuario ui_ * se pueden ubicar en: demo-ui.js
   */
   var num=3;
  $('#drag-and-drop-zoneCaratula').dmUploader({ //
    url: 'controller/uploadP.php',
    multiple:false,
    maxFileSize: 3000000, // 3 Megs 
    allowedTypes: 'application/pdf',
    auto: false,
    queue: false,
    onDragEnter: function(){
      //Sucede al arrastrar algo sobre el área DnD
      this.addClass('active');
    },
    onDragLeave: function(){
      // Ocurre al arrastrar algo fuera del área DnD
      this.removeClass('active');
    },
    onInit: function(){
     // El complemento está listo para usar
    },
    onComplete: function(){
    },
    onNewFile: function(id, file){
      // Cuando se agrega un nuevo archivo usando el selector de archivos o el área DnD
      swal('Archivo','En listado','success');
      ui_multi_add_file(id, file,num);
  $('#pills-contact-tab').removeClass('active').attr("aria-selected",'false');
  $('#pills-contact').removeClass('active show');
  $('#pills-home-tab2').addClass('nav-link active').attr("aria-selected",'true');
  $('#pills-home2').addClass('nav-link active show');
    },
    onBeforeUpload: function(id){
      // acerca de comenzar a cargar un archivo
      ui_multi_update_file_status(id, 'uploading', 'Uploading...');
      ui_multi_update_file_progress(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Ocurre cuando el usuario cancela directamente un archivo.
      ui_multi_update_file_status(id, 'warning', 'Archivo Cancelado');
      ui_multi_update_file_progress(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Actualización del progreso del archivo
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      // Un archivo se cargó correctamente
      ui_multi_update_file_status(id, 'success', 'Carga completa');
      ui_multi_update_file_progress(id, 100, 'success', false);
     
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // Cuando el navegador no admite este complemento :(
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    }
  });
 
});

 $('#btnApiStart').on('click', function(evt){
    evt.preventDefault();
    $('#drag-and-drop-zone').dmUploader('start');
    $('#drag-and-drop-zoneFiscal').dmUploader('start');
    $('#drag-and-drop-zoneCaratula').dmUploader('start');
      $('#btnFinalizar').removeAttr("disabled");
  });

$('#files').on('click', 'button.cancel', function(evt){
    evt.preventDefault();

    var id = $(this).closest('li.media').data('file-id'+1);
    var id2 = $(this).closest('li.media').data('file-id'+2);
    var id3 = $(this).closest('li.media').data('file-id'+3);

    $('#drag-and-drop-zone').dmUploader('cancel', id);
    $('#drag-and-drop-zoneFiscal').dmUploader('cancel', id2);
    $('#drag-and-drop-zoneCaratula').dmUploader('cancel', id3);
    
  });