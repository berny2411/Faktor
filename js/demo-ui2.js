  /*
   * Algunas funciones de ayuda para trabajar con nuestra interfaz de usuario y mantener nuestro código más limpio
   */


// Agrega una entrada a nuestra área de depuración
function ui_add_log2(message, color)
{
  var d = new Date();

  var dateString = (('0' + d.getHours())).slice(-2) + ':' +
    (('0' + d.getMinutes())).slice(-2) + ':' +
    (('0' + d.getSeconds())).slice(-2);

  color = (typeof color === 'undefined' ? 'muted' : color);

  var template = $('#debug-template2').text();
  template = template.replace('%%date%%', dateString);
  template = template.replace('%%message%%', message);
  template = template.replace('%%color%%', color);
  
  $('#debug2').find('li.empty').fadeOut(); // elimina el mensaje "todavía no hay mensajes"
  $('#debug2').prepend(template);
}

// Crea un nuevo archivo y lo agrega a nuestra lista
function ui_multi_add_file2(id, file)
{
  var template = $('#files-template2').text();
  template = template.replace('%%filename%%', file.name);

  template = $(template);
  template.prop('id', 'uploaderFile' + id);
  template.data('file-id', id);

  $('#files2').find('li.empty').fadeOut(); // elimina el 'no hay archivos todavía'
  $('#files2').prepend(template);
}

// Cambia los mensajes de estado en nuestra lista
function ui_multi_update_file_status2(id, status, message)
{
  $('#uploaderFile' + id).find('span').html(message).prop('class', 'status text-' + status);
}

// Actualiza el progreso de un archivo, dependiendo de los parámetros, puede animarlo o cambiar el color.
function ui_multi_update_file_progress2(id, percent, color, active)
{
  color = (typeof color === 'undefined' ? false : color);
  active = (typeof active === 'undefined' ? true : active);

  var bar = $('#uploaderFile' + id).find('div.progress-bar');

  bar.width(percent + '%').attr('aria-valuenow', percent);
  bar.toggleClass('progress-bar-striped progress-bar-animated', active);

  if (percent === 0){
    bar.html('');
  } else {
    bar.html(percent + '%');
  }

  if (color !== false){
    bar.removeClass('bg-success bg-info bg-warning bg-danger');
    bar.addClass('bg-' + color);
  }
}