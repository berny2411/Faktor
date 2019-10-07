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
                            <li class="active">Documentos Personales</li>
                            <?php
                            }else if($_SESSION['rolUsuario']==2){
                            ?>
                            <li><a href="admin.php">Inicio</a></li>
                           <li class="active">Documentos Personales</li>
                            <?php
                            }else{
                            ?>
                            <li><a href="medico.php">Inicio</a></li>
                            <li class="active">Documentos Personales</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row toolbar">
                                    <div class="col-3">
                                        <strong class="card-title">Documentos Personales</strong>
                                    </div>
                                    <div class="col-3">
                                <a href="medico.php?page=documentos/documentosP" >
                                  <button class="btn btn-secondary" title="Subir Documentos"><span class="fa fa-upload fa-lg" style="color:#FFFFFF;"></span></button>
                              </a>
                              
                          </div> 
                          <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                          <span class="fa fa-upload" style="color:#FFFFFF;"></span>
                      </button>

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
                                    <?php include("controller/viewsDocumentosP.php")?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/avatar/robocito" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="images/avatar/5" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="images/avatar/4" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span><i class="fa fa-pencil" style="color:#3339FF;"></i></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

