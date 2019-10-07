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
                            <li class="active">Personal Medico</li>
                            <?php
                            }else if($_SESSION['rolUsuario']==2){
                            ?>
                            <li><a href="admin.php">Inicio</a></li>
                           <li class="active">Personal Medico</li>
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
                            <div class="col-4">
                                <strong class="card-title">Personal Medico</strong>
                            </div>

                        </div>

                    </div>
                    <div class="card-body">
                        <input type="hidden" id="idDoc" value="">
                        <div class="row">
                           <?php include("controller/viewsCarpetaP.php")?>
                          </div>

                      </div>
                  </div>
              </div>


          </div>
      </div><!-- .animated -->
        </div><!-- .content -->