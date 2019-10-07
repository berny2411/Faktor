<?php
require_once('model/procedimiento.php');
require_once('model/usuario.php');
require_once('model/paciente.php');
require_once('model/aseguradora.php');
require_once("model/archivos.php");


$procedimiento = new Procedimiento();
$id= isset($_GET['id'])?$_GET['id']:null;
$proced    = $procedimiento -> getUserById($id);
$correo=['siniestro'];
$nAseguradora ='';
$direccionAseguradora ='';
$pagina='';
if($proced){
	$siniestro  =$proced[0]['siniestro'];
	$fecha =$proced[0]['fechaCasoMedico'];
	$descripcion   =$proced[0]['descripcion'];
	$rol   =$proced[0]['rolMedicoEnCaso'];
	$honorarios   =$proced[0]['honorariosMedico'];
	$status =$proced[0]['status'];
	$medico   =$proced[0]['Usuario_idUsuario'];
	$doCaso =$proced[0]['documentosCasoMedico_iddocumentosCasoMedico'];
	$paciente   =$proced[0]['Paciente_idPaciente'];
	$aseguradoraa   =$proced[0]['Aseguradora_idAseguradora'];

}



$usuario = new Usuario();

$users    = $usuario -> getUserById($medico);
     // $correo=['siniestro'];
$nAseguradora ='';
$direccionAseguradora ='';
$pagina='';
if($users){
	$iduser=$users[0]['idUsuario'];
	$correouser=$users[0]['usuario'];
	$nombreuser  =$users[0]['nombreUsuario'];
	$apellidouser=$users[0]['apellidoPatUsuario'];
	$direccionUser=$users[0]['direccionUsuario'];
	$telefonoUser=$users[0]['numTelefonoUsuario'];
	$cuentaUser=$users[0]['numCuenta'];
	$bancoUser=$users[0]['bancoAfiliado'];
	$folioUser=$users[0]['folioFiscal'];
	$rfcUser=$users[0]['rfc'];

}


$pacienteo = new Paciente();

$pac    = $pacienteo -> getUserById($paciente);
     // $correo=['siniestro'];
$nAseguradora ='';
$direccionAseguradora ='';
$pagina='';
if($pac){
	$idPaciente=$pac[0]['idPaciente'];
	$nombrePaciente=$pac[0]['nombrePaciente'];
	$apellidoPaciente  =$pac[0]['apellidoPatPaciente'];
	$hospital=$pac[0]['hospital'];
	$cuartoHospital=$pac[0]['cuartoHospital'];
	$telefonoPaciente=$pac[0]['numTelefonoPaciente'];
	$emailPaciente=$pac[0]['emailPaciente'];
	$urlPaciente=$pac[0]['urlPaciente'];



}

$aseguradora=new Aseguradora();
$as= $aseguradora -> getAseguradora2($medico,$aseguradoraa);
if($as){
	$usu=$as[0]['usuarioAseguradora'];
	$passw=$as[0]['passwordAseguradora'];

}






?>


<div class="content">
	<div class="animated fadeIn">


		<div class="row">

			<div class="col-lg-8">
				<div class="card">

					<div class="card-header">procedimiento
					<?php if($_SESSION['rolUsuario']==3) {?>
						<button id="editarPro" class="btn btn-primary" title ="Editar" ><span class="fa fa-pencil" style="color:#FFFFFF"></span></button>
						<button id="guardarPro" class="btn btn-primary" title ="Guardar" ><span class="fa fa-floppy-o" style="color:#FFFFFF"></span>
						<?php
					}
					?>
						</div>
						<div class="card-body card-block">

							<form id="desgloceDatosProcedimiento">



								<div class="form-group">
									<div class="input-group">

										<input type="hidden" name="id" value="<?php echo $id ?>">
										<div class="input-group-addon col-md-3" style="text-align:left" ><i class="fa fa-key" > Id:</i></div>
										<input  id="idCaso" type="text" name="id" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $id; ?>">
									</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-file "> Siniestro:</i></div>
										<input id="siniestro" type="text" name="sin" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $siniestro; ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-calendar"> Fecha:</i></div>
										<input id="fecha" type="text" name="iddisable" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $fecha; ?>">
									</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa  fa-file-text-o"> Descripción:</i></div>
										<input id ="descripcion" type="text" name="descripcion" placeholder="Disabled" disabled="" class=" form-control" autofocus required value="<?php echo $descripcion; ?>">
									</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-user-md"> Rol del Médico:</i></div>
										<input id="rol" type="text" name="rol" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $rol; ?>">
									</div>
								</div>


								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-dollar"> Honorarios:</i></div>
										<input id="honorario" type="text" name="honorario" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo "$".$honorarios; ?>">
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

							</form>

						</div>
					</div>

					<div class="card">
						<div class="card-header">
							<div class="row toolbar">
								<div class="col-5">
									<strong class="card-title">Documentos Procedimiento</strong>
								</div>
								<?php
								if($_SESSION['rolUsuario']==1 || $_SESSION['rolUsuario']==2){
								?>
								<div class="col col-lg-2 ml-auto">
								<a href="master.php?page=documentos/documentosCA&d=<?php echo $doCaso?>" >
									<button class="btn btn-secondary" title="Subir Documento" style="margin-left: -60px;"><span class="fa fa-upload fa-lg" style="color:#FFFFFF;"></span></button>
								</a>
							</div>
								<?php
							}
								?>
							</div>

						</div>
						<div class="card-body">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Archivo</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$obj = new Archivos();
									$datos=$obj-> getCasoMedico($doCaso);
									foreach ($datos as $key ) {  
										$url=$key['urlArchivoC'];
									}                  

									$filepath = sprintf('%s/',$url);
									$carpeta=substr($filepath, 3);;
									if(is_dir($carpeta)){
										if($dir = opendir($carpeta)){
											while(($archivo = readdir($dir)) !== false){
												if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
													$extension=substr($archivo, -3);
													if($extension=='pdf'){
														?>
														<tr>
															<td>
																<a href="<?php echo$carpeta.$archivo ?>" target="_blank"><img src="img/icopdf.png" ></a><a href="<?php echo $carpeta.$archivo ?>" target="_blank"><?php echo $archivo ?></a>
															</td>
															<td>
																<a href="<?php echo$carpeta.$archivo ?>" download="<?php echo $archivo ?>">
																	<button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
																</a>
															</td>
														</tr>
														<?php
													}else if($extension=='xml'){
														?>
														<tr>
															<td>
																<a href="<?php echo$carpeta.$archivo ?>" target="_blank"><img src="img/icoxml.png" ></a><a href="<?php echo $carpeta.$archivo ?>" target="_blank"><?php echo $archivo ?></a>
															</td>
															<td>
																<a href="<?php echo$carpeta.$archivo ?>" download="<?php echo $archivo ?>">
																	<button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
																</a>
																<?php 
															}
														}
													}
													closedir($dir);
												}
											}


											?>
										</tbody>
									</table>
								</div>
							</div>



							<div class="card">
								<div class="card-header">Médico</div>

								<div class="card-body card-block">

									<form id="desgloseMedico">


										<input type="hidden" name="idMedico" value="<?php echo $iduser ?>">

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-key"> Id:</i></div>
												<input type="text" name="iddisable" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $iduser; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div  class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-envelope"> Correo:</i></div>
												<input id="correoUser" type="text" name="correoUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $correouser; ?>">
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-user-md"> Nombre:</i></div>
												<input  id="nombreUser" type="text" name="nombreUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $nombreuser; ?>">
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-user-md"> Apellidos:</i></div>
												<input id="apellidoUser" type="text" name="apellidoUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $apellidouser; ?>">
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-map-marker"> Dirección:</i></div>
												<input id="direccionUser" type="text" name="direccionUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $direccionUser; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-phone"> Telefono:</i></div>
												<input id="telefonoUser" type="text" name="telefonoUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $telefonoUser; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-tag"> Cuenta Bancaria:</i></div>
												<input id="cuentaUser" type="text" name="cuentaUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $cuentaUser; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-building-o"> Banco Afiliado:</i></div>
												<input id="bancoUser" type="text" name="bancoUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $bancoUser; ?>">
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa  fa-user-md"> RFC:</i></div>
												<input id="rfcUser" type="text" name="rfcUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $rfcUser; ?>">
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

									</form>

								</div>
							</div>


							<div class="card">
								<div class="card-header">
									<div class="row toolbar">
										<div class="col-2">
											<strong class="card-title">Medico</strong>
										</div>

									</div>

								</div>
								<div class="card-body">
									<table id="bootstrap-data-table" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Archivo</th>
												<th>Opciones</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$obj = new Archivos();
											$datos=$obj-> getListArchivos();
											foreach ($datos as $key ) {
												if($correouser==$key['idDocumentosPersonal'])          
													$url=$key['urlArchivo'];
											}
											$filepath = sprintf('%s/',$url);
											$carpeta=substr($filepath, 3);
											if(is_dir($carpeta)){
												if($dir = opendir($carpeta)){
													while(($archivo = readdir($dir)) !== false){
														if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
															$extension=substr($archivo, -3);
															if($extension=='pdf'){
																?>
																<tr>
																	<td><a href="<?php echo$carpeta.$archivo ?>" target="_blank"><img src="img/icopdf.png" ></a><a href="<?php echo$carpeta.$archivo ?>" target="_blank"><?php echo $archivo ?></a></td>
																	<td>
																		<a href="<?php echo$carpeta.$archivo ?>" download="<?php echo $archivo ?>">
																			<button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
																		</a>

																	</td>
																</tr>
																<?php
															}
														}
													}
													closedir($dir);
												}
											}


											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>




						<div class="col-lg-8">
							<div class="card">
								<div class="card-header">Paciente  
									<?php if($_SESSION['rolUsuario']==3) {?>
									<button id="editarPac" class="btn btn-primary" title ="Editar" ><span class="fa fa-pencil" style="color:#FFFFFF"></span></button>
									<button id="guardarPac" class="btn btn-primary" title ="Guardar   " ><span class="fa fa-floppy-o" style="color:#FFFFFF"></span>
										<?php
									}
									?>
									</div>
									<div class="card-body card-block">

										<form id="desglosePaciente">

											<input type="hidden" name="idPaciente" value="<?php echo $idPaciente ?>">



											<div class="form-group">
												<div class="input-group">


													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-key"> Id:</i></div>

													<input type="text" name="iddisable" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $idPaciente; ?>">
												</div>
											</div>

											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-user"> Nombre:</i></div>
													<input id="nombrePaciente" type="text" name="nPaciente" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $nombrePaciente; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-user"> Apellidos:</i></div>
													<input id="apellidoPaciente" type="text" name="apellidoPat" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $apellidoPaciente; ?>">
												</div>
											</div>

											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-hospital-o"> Hospital:</i></div>
													<input id="hospital" type="text" name="hospital" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $hospital; ?>">
												</div>
											</div>

											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-h-square"> # Cuarto:</i></div>
													<input id="cuarto" type="text" name="cuartoHospital" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $cuartoHospital; ?>">
												</div>
											</div>


											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-phone"> Telefono:</i></div>
													<input id="telefono" type="text" name="numTel" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $telefonoPaciente; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-envelope"> Email:</i></div>
													<input id="emailPac" type="text" name="emailP" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $emailPaciente; ?>">
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

										</form>

									</div>
								</div>

								<div class="card">
									<div class="card-header">
										<div class="row toolbar">
											<div class="col-4">
												<strong class="card-title">Documentos Paciente</strong>
											</div>

										</div>

									</div>
									<div class="card-body">
										<table id="bootstrap-data-table" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>Archivo</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$filepath = sprintf('%s/',$urlPaciente);
												$carpeta=substr($filepath, 3);
												if(is_dir($carpeta)){
													if($dir = opendir($carpeta)){
														while(($archivo = readdir($dir)) !== false){
															if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
																?>
																<tr>
																	<td><a href="<?php echo$carpeta.$archivo ?>" target="_blank"><img src="img/icopdf.png" ></a><a href="<?php echo$carpeta.$archivo ?>" target="_blank"><?php echo $archivo ?></a></td>
																	<td>
																		<a href="<?php echo$carpeta.$archivo ?>" download="<?php echo $archivo ?>">
																			<button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
																		</a>


																	</td>
																</tr>
																<?php
															}
														}
														closedir($dir);
													}
												}


												?>
											</tbody>
										</table>
									</div>
								</div>


								<div class="card">
									<div class="card-header">Aseguradora
									</div>
									<div class="card-body card-block">

										<form id="desgloseMedico">


											<input type="hidden" name="idMedico" value="<?php echo $aseguradoraa ?>">


											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-key"> Usuario:</i></div>
													<input  id="nombreUser" type="text" name="nombreUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $usu ?>">
												</div>
											</div>

											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon col-sm-3" style="text-align:left"><i class="fa fa-key"> Contraseña:</i></div>
													<input id="apellidoUser" type="text" name="apellidoUser" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $passw ?>">
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

										</form>

									</div>
								</div>
								<?php 
								if($_SESSION['rolUsuario']==1||$_SESSION['rolUsuario']==2){
									?>
									<div class="card">
										<div class="card-header">Status
										</div>
										<div class="card-body card-block">

											<form id="StatusProcedimiento">


												<div class="row form-group">
													<div class="col col-md-2"><label for="select" class=" form-control-label">Medico</label></div>
													<div class="col-12 col-md-6">
														<input type="hidden" name="idCS" value="<?php echo $id ?>">
														<select name="selectStatus" id="selectStatus" class="form-control">

															<?php 
															switch ($status) {
																case 4:
																?>
																<option value="<?php echo $status ?>">INCOMPLETO</option>
																<option value="5">REVISION</option>
																<option value="3">EN PROCESO</option>
																<option value="2">ACEPTADO</option>
																<option value="1">RECHAZADO</option>
																<option value="0">CERRADO</option>
																<?php
																break;
																case 5:
																?>
																<option value="<?php echo $status ?>">REVISION</option>
																<option value="4">INCOMPLETO</option>
																<option value="3">EN PROCESO</option>
																<option value="2">ACEPTADO</option>
																<option value="1">RECHAZADO</option>
																<option value="0">CERRADO</option>
																<?php
																break;
																case 3:
																?>
																<option value="<?php echo $status ?>">EN PROCESO</option>
																<option value="5">REVISION</option>
																<option value="4">INCOMPLETO</option>
																<option value="2">ACEPTADO</option>
																<option value="1">RECHAZADO</option>
																<option value="0">CERRADO</option>
																<?php
																break;
																case 2:
																?>
																<option value="<?php echo $status ?>">ACEPTADO</option>
																<option value="5">REVISION</option>
																<option value="4">INCOMPLETO</option>
																<option value="3">EN PROCESO</option>
																<option value="1">RECHAZADO</option>
																<option value="0">CERRADO</option>
																<?php
																break;
																case 1:
																?>
																<option value="<?php echo $status ?>">RECHAZADO</option>
																<option value="5">REVISION</option>
																<option value="4">INCOMPLETO</option>
																<option value="3">EN PROCESO</option>
																<option value="2">ACEPTADO</option>
																<option value="0">CERRADO</option>
																<?php
																break;
																case 0:
																?>
																<option value="<?php echo $status ?>">CERRADO</option>
																<option value="5">REVISION</option>
																<option value="4">INCOMPLETO</option>
																<option value="3">EN PROCESO</option>
																<option value="2">ACEPTADO</option>
																<option value="1">RECHAZADO</option>

																<?php
																break;
															}
															?>


														</select>

													</div>




													<div class="row" id="load" hidden="hidden">
														<div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
															<img src="img/load.gif" width="100%" alt="">
														</div>
														<div class="col-xs-12 center text-accent">
															<span>Validando información...</span>
														</div>
													</div>

												</form>
												<div class="col-md-3"><button type="button" class="btn btn-primary" id='cambiarStatus'><span class="fa  fa-refresh fa-lg" style="color:#FFFFFF;"></span> Actualizar</button></div>
											</div>
										</div>
									</div>
									<?php
								}
								?>

							</div>




						</div>

					</div><!-- .animated -->
				</div><!-- .content -->

