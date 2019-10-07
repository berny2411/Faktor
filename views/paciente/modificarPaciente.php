

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
    <?php
    require_once('model/paciente.php');
    
    $update = new Paciente();
    $id= isset($_GET['id'])?$_GET['id']:null;
  $paciente    = $update -> getUserById($id);
  $nPaciente ='';
  $direccionAseguradora ='';
  $pagina='';
  if($paciente){
    $nPaciente  =$paciente[0]['nombrePaciente'];
    $apellidoP =$paciente[0]['apellidoPatPaciente'];
    $apellidoM   =$paciente[0]['apellidoMatPaciente'];
    $hospital   =$paciente[0]['hospital'];
    $cHospital   =$paciente[0]['cuartoHospital'];
    $numTel   =$paciente[0]['numTelefonoPaciente'];
    $email  =$paciente[0]['emailPaciente'];

  }
    ?>
    
        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Actualizar Paciente</div>
                        <div class="card-body card-block">
                            <form id="update_Paciente">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input type="text" name="iddisable" placeholder="Disabled" disabled="" class="form-control" autofocus required value="<?php echo $id; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text" name="nPaciente" placeholder="Ingresa aseguradora" class="form-control" autofocus required value="<?php echo $nPaciente; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text"  name="apellidoPat" placeholder="Ingresa apellido Paterno" class="form-control" autofocus required value="<?php echo $apellidoP; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text"  name="apellidoMat" placeholder="Ingresa apellido Materno" class="form-control" autofocus required value="<?php echo $apellidoM; ?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-hospital-o"></i></div>
                                        <input type="text"  name="hospital" placeholder="Ingresa hospital" class="form-control" autofocus required value="<?php echo $hospital; ?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-h-square"></i></div>
                                        <input type="text"  name="cuartoHospital" placeholder="Ingresa habitacion" class="form-control" autofocus required value="<?php echo $cHospital; ?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text"  name="numTel" placeholder="Ingresa telefono" class="form-control" autofocus required value="<?php echo $numTel; ?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text"  name="emailP" placeholder="Ingresa email" class="form-control" autofocus required value="<?php echo $email; ?>">
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

                            <div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="updateP">Submit</button></div>
                             <input type="hidden" name="idPaciente" value="<?php echo $id ?>">
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->

