
/*
 * dmUploader: widget de cargador de archivos jQuery Ajax
 * https://github.com/danielm/uploader
 * *
 * Copyright Daniel Morales <daniel85mg@gmail.com>
 * Publicado bajo la licencia MIT.
 * https://github.com/danielm/uploader/blob/master/LICENSE.txt
 * *
 * @preserve
 */
/* global define, define, window, document, FormData */

(function(factory) {
  "use strict";
  if (typeof define === "function" && define.amd) {
// AMD. Registrarse como un módulo anónimo.
    define(["jquery"], factory);
  } else if (typeof exports !== "undefined") {
    module.exports = factory(require("jquery"));
  } else {
    // Globales del navegador
    factory(window.jQuery);
  }
}(function($) {
  "use strict";

  var pluginName = "dmUploader";

  var FileStatus = {
    PENDING: 0,
    UPLOADING: 1,
    COMPLETED: 2,
    FAILED: 3,
    CANCELLED: 4 // (por el usuario)
  };

  // Estos son los valores predeterminados del complemento
  var defaults = {
    auto: true,
    queue: true,
    dnd: true,
    hookDocument: true,
    multiple: true,
    url: document.URL,
    method: "POST",
    extraData: {},
    headers: {},
    dataType: null,
    fieldName: "file",
    maxFileSize: 0,
    allowedTypes: "*",
    extFilter: null,
    onInit: function(){},
    onComplete: function(){},
    onFallbackMode: function() {},
    onNewFile: function(){},        //params: id, file
    onBeforeUpload: function(){},   //params: id
    onUploadProgress: function(){}, //params: id, percent
    onUploadSuccess: function(){},  //params: id, data
    onUploadCanceled: function(){}, //params: id
    onUploadError: function(){},    //params: id, xhr, status, message
    onUploadComplete: function(){}, //params: id
    onFileTypeError: function(){},  //params: file
    onFileSizeError: function(){},  //params: file
    onFileExtError: function(){},   //params: file
    onDragEnter: function(){},
    onDragLeave: function(){},
    onDocumentDragEnter: function(){},
    onDocumentDragLeave: function(){}
  };
  
  var DmUploaderFile = function(file, widget)
  {
    this.data = file;

    this.widget = widget;

    this.jqXHR = null;

    this.status = FileStatus.PENDING;

    // ¿La identificación del archivo no tiene que ser tan especial ... o no?
    this.id = Math.random().toString(36).substr(2);
  };

  DmUploaderFile.prototype.upload = function()
  {
    var file = this;

    if (!file.canUpload()) {

      if (file.widget.queueRunning && file.status !== FileStatus.UPLOADING) {
        file.widget.processQueue();
      }

      return false;
    }

    // Datos del formulario
    var fd = new FormData();
    fd.append(file.widget.settings.fieldName, file.data);

    // Añadir datos de formulario adicionales
    var customData = file.widget.settings.extraData;
    if (typeof(customData) === "function") {
      customData = customData.call(file.widget.element, file.id);
    }

    $.each(customData, function(exKey, exVal) {
      fd.append(exKey, exVal);
    });

    file.status = FileStatus.UPLOADING;
    file.widget.activeFiles++;

    file.widget.settings.onBeforeUpload.call(file.widget.element, file.id);

    // Ajax Enviar
    file.jqXHR = $.ajax({
      url: file.widget.settings.url,
      type: file.widget.settings.method,
      dataType: file.widget.settings.dataType,
      data: fd,
      headers: file.widget.settings.headers,
      cache: false,
      contentType: false,
      processData: false,
      forceSync: false,
      xhr: function() { return file.getXhr(); },
      success: function(data) { file.onSuccess(data); },
      error: function(xhr, status, errMsg) { file.onError(xhr, status, errMsg); },
      complete: function() { file.onComplete(); },
    });

    return true;
  };

  DmUploaderFile.prototype.onSuccess = function(data)
  {
    this.status = FileStatus.COMPLETED;
    this.widget.settings.onUploadSuccess.call(this.widget.element, this.id, data);
  };

  DmUploaderFile.prototype.onError = function(xhr, status, errMsg)
  {
    // Si el estado es: cancelado (por el usuario) no invoque la devolución de llamada de error
    if (this.status !== FileStatus.CANCELLED) {
      this.status = FileStatus.FAILED;
      this.widget.settings.onUploadError.call(this.widget.element, this.id, xhr, status, errMsg);
    }
  };

  DmUploaderFile.prototype.onComplete = function()
  {
    this.widget.activeFiles--;

    if (this.status !== FileStatus.CANCELLED) {
      this.widget.settings.onUploadComplete.call(this.widget.element, this.id);
    }

    if (this.widget.queueRunning) {
      this.widget.processQueue();
    } else if (this.widget.settings.queue && this.widget.activeFiles === 0) {
      this.widget.settings.onComplete.call(this.element);
    }
  };

  DmUploaderFile.prototype.getXhr = function()
  {
    var file = this;
    var xhrobj = $.ajaxSettings.xhr();

    if (xhrobj.upload) {
      xhrobj.upload.addEventListener("progress", function(event) {
        var percent = 0;
        var position = event.loaded || event.position;
        var total = event.total || event.totalSize;

        if (event.lengthComputable) {
          percent = Math.ceil(position / total * 100);
        }
        file.widget.settings.onUploadProgress.call(file.widget.element, file.id, percent);
      }, false);
    }

    return xhrobj;
  };

  DmUploaderFile.prototype.cancel = function(abort)
  {
    // El indicador de aborto es rastrear si estamos llamando a esta función directamente (usando el método cancel, por id)
    // o la llamada proviene del método 'global', también conocido como cancelAll.
    // Esto significa que no queremos activar el evento de cancelación en el archivo que no se está cargando, A MENOS que lo haga directamente
    // ... y sí, se podría hacer más bonito. Revisión (?)
    abort = (typeof abort === "undefined" ? false : abort);

    var myStatus = this.status;

    if (myStatus === FileStatus.UPLOADING || (abort && myStatus === FileStatus.PENDING)) {
      this.status = FileStatus.CANCELLED;
    } else {
      return false;
    }

    this.widget.settings.onUploadCanceled.call(this.widget.element, this.id);

    if (myStatus === FileStatus.UPLOADING) {
      this.jqXHR.abort();
    }

    return true;
  };

  DmUploaderFile.prototype.canUpload = function()
  {
    return (
      this.status === FileStatus.PENDING ||
      this.status === FileStatus.FAILED
    );
  };

  var DmUploader = function(element, options)
  {
    this.element = $(element);
    this.settings = $.extend({}, defaults, options);

    if (!this.checkSupport()) {
      $.error("Browser not supported by jQuery.dmUploader");

      this.settings.onFallbackMode.call(this.element);

      return false;
    }

    this.init();

    return this;
  };

  DmUploader.prototype.checkSupport = function()
  {
    // Este es obligatorio para todos los modos
    if (typeof window.FormData === "undefined") {
      return false;
    }

    // Prueba basada en: Modernizr / feature-detects / forms / fileinput.js
    var exp = new RegExp(
      "/(Android (1.0|1.1|1.5|1.6|2.0|2.1))|"+
      "(Windows Phone (OS 7|8.0))|(XBLWP)|"+
      "(ZuneWP)|(w(eb)?OSBrowser)|(webOS)|"+
      "(Kindle\/(1.0|2.0|2.5|3.0))/");

    if (exp.test(window.navigator.userAgent)) {
      return false;
    }

    return !$("<input type=\"file\" />").prop("disabled");
  };

  DmUploader.prototype.init = function()
  {
    var widget = this;

    // Queue vars
    this.queue = [];
    this.queuePos = -1;
    this.queueRunning = false;
    this.activeFiles = 0;
    this.draggingOver = 0;
    this.draggingOverDoc = 0;

    var input = widget.element.is("input[type=file]") ?
      widget.element : widget.element.find("input[type=file]");

    // - ¿Es la entrada nuestro elemento principal en sí mismo?
    if (input.length > 0) {
      input.prop("multiple", this.settings.multiple);

      // ¿O tiene la entrada como hijo?
      input.on("change." + pluginName, function(evt) {
        var files = evt.target && evt.target.files;

        if (!files || !files.length){
          return;
        }

        widget.addFiles(files);

        $(this).val("");
      });
    }

    if (this.settings.dnd) {
      this.initDnD();
    }

    if (input.length === 0 && !this.settings.dnd) {
      // Activa un error porque si esto sucede, el complemento no hará nada.
      $.error("Markup error found by jQuery.dmUploader");

      return null;
    }

    // ¡Estamos bien para ir, diles!
    this.settings.onInit.call(this.element);

    return this;
  };

  DmUploader.prototype.initDnD = function()
  {
    var widget = this;

    // - Ahora nuestro propio Drop
    widget.element.on("drop." + pluginName, function (evt) {
      evt.preventDefault();

      if (widget.draggingOver > 0){
        widget.draggingOver = 0;
        widget.settings.onDragLeave.call(widget.element);
      }

      var dataTransfer = evt.originalEvent && evt.originalEvent.dataTransfer;
      if (!dataTransfer || !dataTransfer.files || !dataTransfer.files.length) {
        return;
      }

      // Tome solo el primer archivo si no acepta múltiples, esto es un poco feo. Necesita revisión?
      var files = [];

      if (widget.settings.multiple) {
        files = dataTransfer.files;
      } else {
        files.push(dataTransfer.files[0]);
      }

      widget.addFiles(files);
    });

    // - Estos dos eventos / devoluciones de llamada solo pueden hacer algunas cosas visuales elegantes
    widget.element.on("dragenter." + pluginName, function(evt) {
      evt.preventDefault();

      if (widget.draggingOver === 0){
        widget.settings.onDragEnter.call(widget.element);
      }

      widget.draggingOver++;
    });

    widget.element.on("dragleave." + pluginName, function(evt) {
      evt.preventDefault();

      widget.draggingOver--;

      if (widget.draggingOver === 0){
        widget.settings.onDragLeave.call(widget.element);
      }
    });

    if (!widget.settings.hookDocument) {
      return;
    }

    // Agregar un poco de espacio de nombres para evitar algunos casos extraños cuando las personas usan varias instancias
    $(document).off("drop." + pluginName).on("drop." + pluginName, function(evt) {
      evt.preventDefault();

      if (widget.draggingOverDoc > 0){
        widget.draggingOverDoc = 0;
        widget.settings.onDocumentDragLeave.call(widget.element);
      }
    });

    $(document).off("dragenter." + pluginName).on("dragenter." + pluginName, function(evt) {
      evt.preventDefault();

      if (widget.draggingOverDoc === 0){
        widget.settings.onDocumentDragEnter.call(widget.element);
      }

      widget.draggingOverDoc++;
    });

    $(document).off("dragleave." + pluginName).on("dragleave." + pluginName, function(evt) {
      evt.preventDefault();

      widget.draggingOverDoc--;

      if (widget.draggingOverDoc === 0){
        widget.settings.onDocumentDragLeave.call(widget.element);
      }
    });

    $(document).off("dragover." + pluginName).on("dragover." + pluginName, function(evt) {
      evt.preventDefault();
    });
  };

  DmUploader.prototype.releaseEvents = function() {
    // Deja a todos solos; _;

    this.element.off("." + pluginName);
    this.element.find("input[type=file]").off("." + pluginName);

    if (this.settings.hookDocument) {
      $(document).off("." + pluginName);
    }
  };

  DmUploader.prototype.validateFile = function(file)
  {
    // Verifica el tamaño del archivo
    if ((this.settings.maxFileSize > 0) &&
        (file.size > this.settings.maxFileSize)) {

      this.settings.onFileSizeError.call(this.element, file);

      return false;
    }

    // Comprobar tipo de archivo
    if ((this.settings.allowedTypes !== "*") &&
        !file.type.match(this.settings.allowedTypes)){

      this.settings.onFileTypeError.call(this.element, file);

      return false;
    }

    // Comprobar extensión de archivo
    if (this.settings.extFilter !== null) {
      var ext = file.name.toLowerCase().split(".").pop();

      if ($.inArray(ext, this.settings.extFilter) < 0) {
        this.settings.onFileExtError.call(this.element, file);

        return false;
      }
    }

    return new DmUploaderFile(file, this);
  };

  DmUploader.prototype.addFiles = function(files)
  {
    var nFiles = 0;

    for (var i= 0; i < files.length; i++)
    {
      var file = this.validateFile(files[i]);

      if (!file){
        continue;
      }

      
      // Si la devolución de llamada devuelve un archivo falso, no se procesará. Esto puede permitir cierta personalización
      var can_continue = this.settings.onNewFile.call(this.element, file.id, file.data);
      if (can_continue === false) {
        continue;
      }

      // Si estamos utilizando la carga automática, y no una cola de archivos: vaya a la carga
      if (this.settings.auto && !this.settings.queue) {
        file.upload();
      }

      this.queue.push(file);
      
      nFiles++;
    }

    // No se agregaron archivos
    if (nFiles === 0) {
      return this;
    }

    // ¿Estamos cargando archivos automáticamente?
    if (this.settings.auto && this.settings.queue && !this.queueRunning) {
      this.processQueue();
    }

    return this;
  };

  DmUploader.prototype.processQueue = function()
  {
    this.queuePos++;

    if (this.queuePos >= this.queue.length) {
      if (this.activeFiles === 0) {
        this.settings.onComplete.call(this.element);
      }

      // Espere hasta que se caigan nuevos archivos
      this.queuePos = (this.queue.length - 1);

      this.queueRunning = false;

      return false;
    }

    this.queueRunning = true;

    // Iniciar el siguiente archivo
    return this.queue[this.queuePos].upload();
  };

  DmUploader.prototype.restartQueue = function()
  {
    this.queuePos = -1;
    this.queueRunning = false;

    this.processQueue();
  };

  DmUploader.prototype.findById = function(id)
  {
    var r = false;

    for (var i = 0; i < this.queue.length; i++) {
      if (this.queue[i].id === id) {
        r = this.queue[i];
        break;
      }
    }

    return r;
  };

  DmUploader.prototype.cancelAll =  function()
  {
    var queueWasRunning = this.queueRunning;
    this.queueRunning = false;

    // cancelarlos todos
    for (var i = 0; i < this.queue.length; i++) {
      this.queue[i].cancel();
    }

    if (queueWasRunning) {
      this.settings.onComplete.call(this.element);
    }
  };

  DmUploader.prototype.startAll = function()
  {
    if (this.settings.queue) {
      // Reanudar la cola
      this.restartQueue();
    } else {
      // o subirlos todos
      for (var i = 0; i < this.queue.length; i++) {
        this.queue[i].upload();
      }
    }
  };

  // Métodos de API pública
  DmUploader.prototype.methods = {
    start: function(id) {
      if (this.queueRunning){
        // No permitir cargar archivos manualmente cuando se está ejecutando una cola
        return false;
      }

      var file = false;

      if (typeof id !== "undefined") {
        file = this.findById(id);

        if (!file) {
          // Archivo no encontrado en la pila
          $.error("File not found in jQuery.dmUploader");

          return false;
        }
      }
      
      // Intentando iniciar una carga por ID
      if (file) {
        if (file.status === FileStatus.CANCELLED) {
          file.status = FileStatus.PENDING;
        }
        return file.upload();
      }

      // Sin identificación proporcionada ...

      this.startAll();

      return true;
    },
    cancel: function(id) {
      var file = false;
      if (typeof id !== "undefined") {
        file = this.findById(id);

        if (!file) {
          // Archivo no encontrado en la pila
          $.error("File not found in jQuery.dmUploader");

          return false;
        }
      }

      if (file) {
        return file.cancel(true);
      }

      // With no id provided...
      
      this.cancelAll();

      return true;
    },
    reset: function() {

      this.cancelAll();

      this.queue = [];
      this.queuePos = -1;
      this.activeFiles = 0;

      return true;
    },
    destroy: function() {
      this.cancelAll();

      this.releaseEvents();

      this.element.removeData(pluginName);
    }
  };

  $.fn.dmUploader = function(options) {
    var args = arguments;

    if (typeof options === "string") {
      this.each(function() {
        var plugin = $.data(this, pluginName);

        if (plugin instanceof DmUploader) {
          if (typeof plugin.methods[options] === "function") {
            plugin.methods[options].apply(plugin, Array.prototype.slice.call(args, 1));
          } else {
            $.error("Method " +  options + " does not exist in jQuery.dmUploader");
          }
        } else {
          $.error("Unknown plugin data found by jQuery.dmUploader");
        }
      });
    } else {
      return this.each(function () {
        if (!$.data(this, pluginName)) {
          $.data(this, pluginName, new DmUploader(this, options));
        }
      });
    }
  };
}));