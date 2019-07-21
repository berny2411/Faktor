
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Agregar</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Agregar</a></li>
                                    <li><a href="#">MedicoAseg</a></li>
                                    <li class="active">Basic</li>
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
                        <div class="card-header">Medico - Aseguradora</div>
                        <div class="card-body card-block" id="formO">
                            <form id="alta_MedicoAs">
                                 <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">Medico</label></div>
                                        <div class="col-12 col-md-6">
                                            <select name="select" id="select" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                 <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">Aseguradora</label></div>
                                        <div class="col-12 col-md-6">
                                            <select name="select" id="select" class="form-control">
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
                                    	 <div class="col col-md-2"><label for="usuario" class=" form-control-label">Usuario</label></div>
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text"  name="userAseguradora" placeholder="Ingresa usuario de la Aseguradora" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="input-group">
                                     <div class="col col-md-2"><label for="password" class=" form-control-label">Password</label></div>	
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
                            
                            </form>

                        </div>
                        <div class="col-md-6 offset-md-4">
                            <div class="form-actions form-group">
                            	<button type="button" class="btn btn-primary" id="altaMS">Guardar</button>
                            	<button type="button" class="btn btn-primary" id="clonform">Insertar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->