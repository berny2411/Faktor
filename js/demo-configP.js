$(function(){
  /*
   
   * Por el bien de mantener el código limpio y los ejemplos simples de este archivo
   * contiene solo la configuración del complemento y las devoluciones de llamada.
   * *
   * Las funciones de la interfaz de usuario ui_ * se pueden ubicar en: demo-ui.js
   */
  $('#drag-and-drop-zoneP').dmUploader({ //
    url: 'controller/uploadPac.php',
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
      ui_add_log2('Ahi vamos :)', 'info');
    },
    onComplete: function(){
      // Todos los archivos en la cola se procesan (éxito o error)
      ui_add_log2('Todos los traslados pendientes terminaron');
    },
    onNewFile: function(id, file){
      // Cuando se agrega un nuevo archivo usando el selector de archivos o el área DnD
      ui_add_log2('Nuevo archivo agregado #' + id);
      ui_multi_add_file2(id, file);
    },
    onBeforeUpload: function(id){
      // acerca de comenzar a cargar un archivo
      ui_add_log2('Iniciando la carga de #' + id);
      ui_multi_update_file_status2(id, 'uploading', 'Uploading...');
      ui_multi_update_file_progress2(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Ocurre cuando el usuario cancela directamente un archivo.
      ui_multi_update_file_status2(id, 'warning', 'Archivo Cancelado');
      ui_multi_update_file_progress2(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Actualización del progreso del archivo
      ui_multi_update_file_progress2(id, percent);
    },
    onUploadSuccess: function(id, data){
      // Un archivo se cargó correctamente
      ui_add_log2('Respuesta del servidor para el archivo #' + id + ': ' + JSON.stringify(data));
      ui_add_log2('Subida de archivo #' + id + ' COMPLETED', 'success');
      ui_multi_update_file_status2(id, 'success', 'Carga completa');
      ui_multi_update_file_progress2(id, 100, 'success', false);
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status2(id, 'danger', message);
      ui_multi_update_file_progress2(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // Cuando el navegador no admite este complemento :(
      ui_add_log2('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log2('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    }
  });
});

 $('#btnApiStartP').on('click', function(evt){
    evt.preventDefault();

    $('#drag-and-drop-zoneP').dmUploader('start');
  });

 $('#files2').on('click', 'button.cancel', function(evt){
    evt.preventDefault();

    var id = $(this).closest('li.media').data('file-id');

    $('#drag-and-drop-zoneP').dmUploader('cancel', id);
    
  });

$(function(){
  /*
   
   * Por el bien de mantener el código limpio y los ejemplos simples de este archivo
   * contiene solo la configuración del complemento y las devoluciones de llamada.
   * *
   * Las funciones de la interfaz de usuario ui_ * se pueden ubicar en: demo-ui.js
   */
  $('#drag-and-drop-zoneFoto').dmUploader({ //
    url: 'controller/uploadFoto.php',
    multiple:false,
    maxFileSize: 3000000, // 3 Megs 
    allowedTypes:'image/*',
    extFilter: ['jpg', 'jpeg','png'],
    onDragEnter: function(){
      //Sucede al arrastrar algo sobre el área DnD
      this.addClass('active');
    },
    onDragLeave: function(){
      // Ocurre al arrastrar algo fuera del área DnD
      this.removeClass('active');
    },
    onInit: function(){
    },
    onComplete: function(){
    },
    onNewFile: function(id, file){
      // Cuando se agrega un nuevo archivo usando el selector de archivos o el área DnD
      ui_multi_add_file2(id, file);
    },
    onBeforeUpload: function(id){
      // acerca de comenzar a cargar un archivo
      ui_multi_update_file_status2(id, 'uploading', 'Uploading...');
      ui_multi_update_file_progress2(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Ocurre cuando el usuario cancela directamente un archivo.
      ui_multi_update_file_status2(id, 'warning', 'Archivo Cancelado');
      ui_multi_update_file_progress2(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Actualización del progreso del archivo
      ui_multi_update_file_progress2(id, percent);
    },
    onUploadSuccess: function(id, data){
      // Un archivo se cargó correctamente
      ui_multi_update_file_status2(id, 'success', 'Carga completa');
      ui_multi_update_file_progress2(id, 100, 'success', false);
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status2(id, 'danger', message);
      ui_multi_update_file_progress2(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // Cuando el navegador no admite este complemento :(
      ui_add_log2('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log2('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    }
  });
});

