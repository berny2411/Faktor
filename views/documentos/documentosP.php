 <div class="breadcrumbs">
 	<div class="breadcrumbs-inner">
 		<div class="row m-0">
 			<div class="col-sm-4">
 				<div class="page-header float-left">
 					<div class="page-title">
 						<h1>Documentos</h1>
 					</div>
 				</div>
 			</div>
 			<div class="col-sm-8">
 				<div class="page-header float-right">
 					<div class="page-title">
 						<ol class="breadcrumb text-right">
 							 <?php
                            if($_SESSION['rolUsuario']==1){
                            ?>
                            <li><a href="master.php">Inicio</a></li>
                           <li><a href="master.php?page=documentos/vistaCarpetaC">Documentos Procedimiento</a></li>
                            <li><a href="master.php?page=documentos/vistaCarpetaC">Listado de Documentos</a></li>
                            <li class="active"> Subir Documentos Procedimientos</li>
                            <?php
                            }else if($_SESSION['rolUsuario']==2){
                            ?>
                            <li><a href="admin.php">Inicio</a></li>
                           <li><a href="admin.php?page=documentos/vistaCarpetaC">Documentos Procedimiento</a></li>
                            <li><a href="admin.php?page=documentos/vistaCarpetaC">Listado de Documentos</a></li>
                            <li class="active"> Subir Documentos Procedimientos</li>
                            <?php
                            }else{
                            ?>
                            <li><a href="medico.php">Inicio</a></li>
                            <li><a href="medico.php?page=documentos/vistaDocumentosP">Documentos Personales</a></li>
                            <li class="active"> Subir Documentos</li>
                            <?php
                            }
                            ?> 
 						</ol>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

 <div class="content">
 	<div class="animated fadeIn">

 		<div class="row">
 			<div class="col-lg-12">
 				<div class="card">
 					<div class="card-header">
 						<h4>Subir Documentos Personales</h4>
 					</div>
 					<div class="card-body">
 						<input type="hidden" id="idDoc" value="">

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
 											<h3 class="mb-5 mt-5 text-muted" align="center"><p>Arrastra &amp; suelta el archivo pdf de INE aquí</p></h3>

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
 									<div class="mt-3" align="center">
 										<a href="#" class="btn btn-primary" id="btnApiStart">
 											<i class="fa fa-play"></i> Cargar
 										</a>	
                                        <button type="button" class="btn btn-info" id='btnFinalizar' disabled="">Regresar</button>
 								</div>
 								</div>
 								
 							</div>

 						</div>






 					</div>
 				</div>
 			</div>
 			<!-- /# column -->

 		</div>
 	</div><!-- .animated -->
 </div><!-- .content -->




