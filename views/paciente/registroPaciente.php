

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
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
                        <div class="card-header">Registro del Paciente</div>
                        <div class="card-body card-block">
                            <form id="alta_Paciente">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text" name="nPaciente" placeholder="Ingresa nombre del paciente" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text"  name="apellidoPat" placeholder="Ingresa apellido Parterno" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text"  name="apellidoMat" placeholder="Ingresa apellido materno" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-hospital-o"></i></div>
                                        <input type="text"  name="hospital" placeholder="Ingresa hospital" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-h-square"></i></div>
                                        <input type="text"  name="cuartoHospital" placeholder="Ingresa el cuarto de Hospital" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text"  name="numPaciente" placeholder="Ingresa Telefono" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text"  name="email" placeholder="Email" class="form-control">
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

                            <div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaP">Submit</button></div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->