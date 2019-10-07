<?php
// Se prendio esta mrd :v
session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] != 3){



    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
      header('location: index.php');

  } 
  ?>

  <!doctype html>
  <html class="no-js" lang="">
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Faktor CPC</title>
  	<meta name="description" content="Ela Admin - HTML5 Admin Template">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" href="img/logo.png">

  	<!-- Include Bootstrap CSS -->
  	<link rel="stylesheet" href="css/bootstrap 4.3.1/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/font awesome/css/font-awesome.min.css">
  	<link rel="stylesheet" href="css/normalize/normalize.min.css">
  	<link rel="stylesheet" href="css/jquery.dm-uploader.min.css" >\
  	<link rel="stylesheet" href="css/sweetalert.css">
  	<link rel="stylesheet" href="assets/css/style.css">
  	<!-- Include SmartWizard CSS -->
  	<link href="css/smart_wizard.css" rel="stylesheet" type="text/css" />

  	<!-- Optional SmartWizard theme -->
  	<link href="css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />

  </head>
  <body>
  	<div id="right-panel" class="right-panel">
  		<header id="header" class="header">
  			<div class="top-left">
  				<div class="navbar-header">
  					<a class="navbar-brand" href="#"><img src="img/SmallLogo.png" alt="Logo"></a>
  					<a class="navbar-brand hidden" href="medico.php"><img src="images/logo2.png" alt="Logo"></a>
  				</div>
  			</div>
  			<div class="top-right">
  				<div class="header-menu">
  					<div class="header-left">


  						<div class="dropdown for-notification">
  							<?php include("controller/notificaciones.php");?>
  						</div>    
  					</div>

  					<div class="user-area dropdown float-right">
  						<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  							<?php include("controller/userFoto.php")?>
  						</a>

  						<div class="user-menu dropdown-menu">

  							<a class="nav-link" href="controller/cerrarSesion.php"><i class="fa fa-power-off"></i>Cerrar Sesion</a>
  						</div>
  					</div>
  				</div>
  			</div>
  		</header><!-- /header -->
  	</div>
  	<div class="content">
  		<div id="smartwizard">
  			<ul>
  				<li><a href="#paso-1">Paso 1<br /><small>Datos Personales</small></a></li>
  				<li><a href="#paso-2">Paso 2<br /><small>Datos Bancarios</small></a></li>
  				<li><a href="#paso-3">Paso 3<br /><small>Medico-Aseguradora</small></a></li>
  				<li><a href="#paso-4">Paso 4<br /><small>Documentos Personales</small></a></li>
  			</ul>

  			<div>
  				<div id="paso-1" class="">
  					<?php
  					$id=$_SESSION['idUsuario'];
  					$users  = $obj -> getUserById($id);

  					if($users){
  						$nombre =$users[0]['nombreUsuario'];
  						$apellidoP =$users[0]['apellidoPatUsuario'];
  						$apellidoM   =$users[0]['apellidoMatUsuario'];
  						$dir=$users[0]['direccionUsuario'];
  						$numTel=$users[0]['numTelefonoUsuario'];

  					}?>
  					<form id="altaMedico1">

  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-user"></i></div>
  								<input type="text" name="nombre" placeholder="" class="form-control" value="<?php echo $_SESSION['nombreUsuario']?>" disabled="">
  							</div>
  						</div>

  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-user"></i></div>
  								<input type="text"  name="apellidoPat" placeholder="Ingrese apellidoPat" class="form-control" value="<?php echo $apellidoP;?>">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-user"></i></div>
  								<input type="text"  name="apellidoMat" placeholder="Ingrese apellidoMat" class="form-control" value="<?php echo $apellidoM;?>">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-user"></i></div>
  								<input type="text" name="rfc" placeholder="RFC" class="form-control">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
  								<input type="text"  name="direccion" placeholder=" Direccion" class="form-control">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
  								<input type="text"  name="telefono" placeholder="Telefono" class="form-control">
  							</div>
  						</div>

  						<div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaMedico">Guardar</button></div>

  					</form>
  				</div>
  				<div id="paso-2" class="">
  					<form id="altaMedicoB3">

  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
  								<input type="text" name="numCuenta" placeholder="Número de cuenta" class="form-control">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon"><i class="fa fa-building-o"></i></div>
  								<input type="text" name="bancoAfiliado" placeholder="Banco Afiliado" class="form-control">
  							</div>
  						</div>

  						<div class="row" id="load" hidden="hidden">
  							<div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
  								<img src="img/load.gif" width="100%" alt="">
  							</div>
  							<div class="col-xs-12 center text-accent">
  								<span>Validando información...</span>
  							</div>
  						</div>

  						<div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaMedicoB2">Guardar</button></div>

  					</form>
  				</div>
  				<div id="paso-3" class="">
  					<div class="card-body card-block">
  						<form id="alta_MedicoAs2" class="form-horizontal">

  							<div class="row form-group">
  								 <div class="col col-md-2"><label for="select" class=" form-control-label" style="margin-left: 16px;">Medico:</label></div>
  								<div class="col-12 col-md-6">
  									<select name="selectUs" id="select" class="form-control">
  										<?php

  										if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 3){
  											?>
  											<option value="<?php echo  $_SESSION['idUsuario']; ?>"><?php echo $_SESSION['nombreUsuario']; ?></option>
  											<?php

  										}else 
  										if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 1){
  											?>
  											<option value="0">Seleccionar</option>
  											<?php 
  											require_once("model/usuario.php");
  											$obj=new Usuario();
  											$datos=$obj->getUserByRol(3);
  											foreach ($datos as $key ) {
  												?>
  												<option value="<?php echo $key['idUsuario']; ?>"><?php echo $key['nombreUsuario']; ?></option>
  												<?php 
  											}
  											?>
  											<?php 
  										}

  										?>
  									</select>
  								</div>

  							</div>
  							<div class="row form-group">
  								 <div class="col col-md-2"><label for="select" class=" form-control-label" style="margin-left: 16px;">Aseguradora:</label></div>
  								<div class="col-12 col-md-6">
  									<select name="selectAs" id="select" class="form-control">
  										<option value="0">Seleccionar</option>
  										<?php 
  										require_once("model/aseguradora.php");
  										$obj=new Aseguradora();
  										$datos=$obj->getListAseguradora();
  										foreach ($datos as $key ) {
  											?>
  											<option value="<?php echo $key['idAseguradora']; ?>"><?php echo $key['nombreAseguradra']; ?></option>
  											<?php 
  										}
  										?>
  									</select>
  								</div>
  							</div>

  							<div class="form-group">
  								<div class="input-group">
  									<div class="col col-md-2"><label for="text-input" class=" form-control-label">Usuario:</label></div>
  									<div class="input-group-addon"><i class="fa fa-user"></i></div>
  									<input type="text"  name="userAseguradora" placeholder="Ingresa usuario de la Aseguradora" class="form-control">
  								</div>
  							</div>

  							<div class="form-group">
  								<div class="input-group">
  									<div class="col col-md-2"><label for="text-input" class=" form-control-label">Password:</label></div>
  									<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
  									<input type="text"  name="passwordAseguradora" placeholder="Password de usuario de la Aseguradora" class="form-control">
  								</div>
  							</div>

  							<div class="row form-group" id="load" hidden="hidden">
  								<div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
  									<img src="img/load.gif" width="100%" alt="">
  								</div>
  								<div class="col-xs-12 center text-accent">
  									<span>Validando información...</span>
  								</div>
  							</div>
  							<div class="form-actions form-group">
  								<button type="button" class="btn btn-primary btn-block" id="altaMS2">Guardar</button>
  							</div>

  						</form>
  					</div>
  				</div>
  				<div id="paso-4" class="">
  					<ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
  						<li class="nav-item">
  							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PDF INE</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">PDF Cedula Fiscal</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">PDF Caratula de Cuenta Bancaria</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" id="pills-home-tab2" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home" aria-selected="true">Subir Documentos</a>
  						</li>
  					</ul>
  					<div class="tab-content" id="pills-tabContent">
  						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  							<div class="row">

  								<div class="col-md-12 col-sm-4">
  									<!-- Our markup, the important part here! -->
  									<div id="drag-and-drop-zone" class="dm-uploader p-5">
  										<h3 class="mb-5 mt-5 text-muted" align="center"><p>Arrastra &amp; suelta el documento oficial en formato PDF.</p><p>Permitidos: INE, Pasaporte, Cedula Profesional y Cartilla Militar.</p></h3>

  										<div class="btn btn-primary btn-block mb-5">
  											<span>Abra el buscador de archivos</span>
  											<input type="file" title='Click to add Files' accept="application/pdf" />
  										</div>
  									</div><!-- /uploader -->

  								</div>



  							</div>
  						</div>
  						<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  							<div class="row">
  								<div class="col-md-12 col-sm-4">

  									<!-- Our markup, the important part here! -->
  									<div id="drag-and-drop-zoneFiscal" class="dm-uploader p-5">
  										<h3 class="mb-5 mt-5 text-muted" align="center"><p>Arrastra &amp; suelta el archivo pdf Cedula Fiscal aquí</p></h3>

  										<div class="btn btn-primary btn-block mb-5">
  											<span>Abra el buscador de archivos</span>
  											<input type="file" title='Click to add Files' accept="application/pdf" />
  										</div>
  									</div><!-- /uploader -->

  								</div>



  							</div>
  						</div>
  						<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  							<div class="row">
  								<div class="col-md-12 col-sm-4">

  									<!-- Our markup, the important part here! -->
  									<div id="drag-and-drop-zoneCaratula" class="dm-uploader p-5">
  										<h3 class="mb-5 mt-5 text-muted" align="center"><p>Arrastra &amp; suelta el archivo pdf Caratula Bancaria aquí</p></h3>

  										<div class="btn btn-primary btn-block mb-5">
  											<span>Abra el buscador de archivos</span>
  											<input type="file" title='Click to add Files' accept="application/pdf" />
  										</div>
  									</div><!-- /uploader -->

  								</div>
  							</div>
  						</div>
  						<div class="tab-pane fade" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab">
  							<div class="col-md-12 col-sm-4">
  								<div class="card h-100">
  									<div class="card-header">
  										Lista de Archivos
  									</div>

  									<ul class="list-unstyled p-2 d-flex flex-column col" id="files">
  										<li class="text-muted text-center empty">No hay archivos cargados</li>
  									</ul>
  								</div>
  								<div class='row'>
  									<div  style="margin-left: auto;margin-right: auto;">
  										<a href="#" class="btn btn-primary" id="btnApiStart">
  											<i class="fa fa-play"></i> Cargar
  										</a>
  									</div>

  								</div>
  							</div>

  						</div>

  					</div>
  				</div>
  			</div>
  		</div>


  	</div>

  	<!-- Include jQuery -->
  	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

  	<script src="js/jquery/dist/jquery.min.js"></script>

  	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  	<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
  	<script src="js/jquery.dm-uploader.min.js"></script>
  	<script src="js/sweetalert.min.js"></script>
  	<script src="js/medAseguradora.js"></script>
  	<script src="js/altaUsuario.js"></script>
  	<script src="js/demo-config.js"></script>
  	<script src="js/demo-ui.js"></script>

  	<!-- Include SmartWizard JavaScript source -->
  	<script type="text/javascript" src="js/jquery.smartWizard.js"></script>

  	<script type="text/html" id="files-template">
  		<li class="media">
  			<div class="media-body mb-1">
  				<p class="mb-2">
  					<strong>%%filename%%</strong> - Estado: <span class="text-muted">Esperando</span>
  				</p>
  				<div class="progress mb-2">
  					<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
  					role="progressbar"
  					style="width: 0%" 
  					aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
  				</div>
  			</div>
  			<p class="controls mb-2">
  				<button href="#" class="btn btn-sm btn-danger cancel" role="button" >Cancel</button>
  			</p>
  			<hr class="mt-1 mb-1" />
  		</div>
  	</li>
  </script>

  <script type="text/javascript">
  	$(document).ready(function(){

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
               	$("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
               	$("#next-btn").addClass('disabled');
               }else{
               	$("#prev-btn").removeClass('disabled');
               	$("#next-btn").removeClass('disabled');
               }
           });

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finalizar')
            .addClass('btn btn-info').attr('id','btnFinalizar').attr('disabled','')
            .on('click', function(){
            	var valor=1;
            	$.ajax({
            		method: 'POST',
            		url: 'controller/statusMedico.php',
            		data: { statusN: valor},
            		success: function(res){
            			$('#load').hide();

            			if(res == 'Fallido'){
            				swal('Error',res, 'warning');
            			}else{
            				window.location.href='medico.php'       
            			}
            		}
            	});
            });


            // Smart Wizard
            $('#smartwizard').smartWizard({
            	selected: 0,
            	theme: 'circles',
            	transitionEffect:'fade',
            	showStepURLhash: true,
            	toolbarSettings: {toolbarPosition: 'bottom',
            	toolbarButtonPosition: 'end',
            	toolbarExtraButtons: [btnFinish]
            }
        });


            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });

            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });

            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });

            $("#theme_selector").on("change", function() {
                // Change theme
                $('#smartwizard').smartWizard("theme", 'circles');
                return true;
            });

            // Set selected theme on page refresh
            $("#theme_selector").change();
        });
    </script>
</body>
</html>