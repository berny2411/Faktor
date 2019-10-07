<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Aseguradora</h1>
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
								<li class="active">Agregar Aseguradora</li>
								<?php
							}else if($_SESSION['rolUsuario']==2){
								?>
								<li><a href="admin.php">Inicio</a></li>
								<li class="active">Agregar Aseguradora</li>
								<?php
							}else{
								?>
								<li><a href="medico.php">Inicio</a></li>
								<li class="active">Agregar Aseguradora</li>
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

			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">Agregar Aseguradora</div>
					<div class="card-body card-block">
						<input type="hidden" id="idDoc" value="">
						<form id="alta_Aseguradora">

							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-building-o"></i></div>
									<input type="text" name="nAseguradora" placeholder="Ingresa aseguradora" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-address-book-o"></i></div>
									<input type="text"  name="direccion" placeholder="Ingresa direccion" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-link"></i></div>
									<input type="text"  name="url" placeholder="Ingresa link" class="form-control">
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

							<div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaAs">Submit</button></div>

						</form>

					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Aseguradoras</strong>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Aseguradora</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								require_once("model/aseguradora.php");
								$obj=new Aseguradora();
								$datos=$obj->getListAseguradora3();
								foreach ($datos as $key ) {
									?>
									<tr>
										<td><?php echo $key['idAseguradora']; ?></td>
										<td><?php echo $key['nombreAseguradra']; ?></td>
									</tr>
									<?php 
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div><!-- .animated -->
</div><!-- .content -->

