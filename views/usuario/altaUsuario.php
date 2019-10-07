<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Usuarios</h1>
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
                                <li class="active">Nuevo Usuario</li>
                                <?php
                            }else if($_SESSION['rolUsuario']==2){
                                ?>
                                <li><a href="admin.php">Inicio</a></li>
                                <li class="active">Nuevo Usuario</li>
                                <?php
                            }else{
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
                    <div class="card-header">Alta de Usuario</div>
                    <div class="card-body card-block">
                        <input type="hidden" id="idDoc" value="">
                        <form id="alta_Usuario">

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="text" name="usuario" placeholder="Ingrese correo" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="text"  name="password" placeholder="Ingrese contrase&ntilde;a" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text"  name="nombre" placeholder="Nombre del Medico" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text"  name="apellidoPat" placeholder="Apellido Paterno" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text"  name="apellidoMat" placeholder="Apellido Materno" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>

                                    <select name="rol"  class="form-control">
                                        <option value="0">Rol de usuario</option>
                                        <option value="1">Master</option>
                                        <option value="2">Administrador</option>
                                        <option value="3">Medico</option>
                                    </select>
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

                            <div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaUser">Submit</button></div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- .animated -->
    </div><!-- .content -->