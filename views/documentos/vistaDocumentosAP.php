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
                            <li><a href="master.php?page=documentos/vistaCarpetaP&d=P">Personal Medico</a></li>
                            <li class="active">Lista de Documentos</li>
                            <?php
                            }else if($_SESSION['rolUsuario']==2){
                            ?>
                            <li><a href="admin.php">Inicio</a></li>
                            <li><a href="admin.php?page=documentos/vistaCarpetaP&d=P">Personal Medico</a></li>
                           <li class="active">Lista de Documentos</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row toolbar">
                                    <div class="col-2">
                                        <strong class="card-title">Medico</strong>
                                    </div>
                                     <div class="col-1">
                                <a href="" download="">
                                  <button class="btn btn-secondary" title="Descargar todos los documentos"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
                              </a>
                              
                          </div>
                                </div>
                                 
                            </div>
                            <div class="card-body">
                                <input type="hidden" id="idDoc" value="">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Archivo</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php include("controller/viewsDocumentosAP.php")?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->