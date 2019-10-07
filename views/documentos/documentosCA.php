

 <div class="breadcrumbs">
 	<div class="breadcrumbs-inner">
 		<div class="row m-0">
 			<div class="col-sm-4">
 				<div class="page-header float-left">
 					<div class="page-title">
 						<h1>Registro Aseguradora</h1>
 					</div>
 				</div>
 			</div>
 			<div class="col-sm-8">
 				<div class="page-header float-right">
 					<div class="page-title">
 						<ol class="breadcrumb text-right">
 							<li><a href="#">Menu</a></li>
 							<li><a href="#">Documentos</a></li>
 							<li class="active">subir Documentos</li>
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
 			
 			<div class="col-lg-12 col-sm-8">
 				<div class="card">
 					<div class="card-header">Documentos</div>
 					<div class="card-body card-block">
 						<main role="main" class="container">

 							<div class="row">
 								<input type="hidden" id="idDoc" value="<?php echo isset($_GET['d'])?$_GET['d']:null;?>">
 								<div class="col-md-6 col-sm-12">
 									 
 									<!-- Our markup, the important part here! -->
 									<div id="drag-and-drop-zoneCE" class="dm-uploader p-5">
 										<h3 class="mb-5 mt-5 text-muted" align="center">Arrastra &amp; suelta el archivo aquí PDF Carta de Aceptacion</h3>

 										<div class="btn btn-primary btn-block mb-5">
 											<span>Abra el buscador de archivos</span>
 											<input type="file" title='Click to add Files' accept="application/pdf" />
 										</div>
 									</div><!-- /uploader -->
 									<div class="mt-2">
 										<a href="#" class="btn btn-primary" id="btnApiStartCA">
 											<i class="fa fa-play"></i> Cargar
 										</a>
 									</div>

 								</div>
 								<div class="col-md-6 col-sm-12">
 									<div class="card h-100">
 										<div class="card-header">
 											Lista de Archivos
 										</div>

 										<ul class="list-unstyled p-2 d-flex flex-column col" id="files">
 											<li class="text-muted text-center empty">No hay archivos cargados.</li>
 										</ul>
 									</div>
 								</div>
 							</div><!-- /file list -->
 							<br>

 						</br>

 					</main> <!-- /container -->
 				</div>
 			</div>
 		</div>

 	</div>

 </div><!-- .animated -->
</div><!-- .content -->