<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    
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
                            <li class="active">Modificar Aseguradora</li>
                            <?php
                            }else if($_SESSION['rolUsuario']==2){
                            ?>
                            <li><a href="admin.php">Inicio</a></li>
                           <li class="active">Modificar Aseguradora</li>
                            <?php
                            }else{
                            ?>
                            <li><a href="medico.php">Inicio</a></li>
                           <li class="active">Modificar Aseguradora</li>
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
                                        <strong class="card-title">Modificar Aseguradora</strong>
                                    </div>
                                    <div class="col-1">
                                      <a href="master.php?page=aseguradora/registroAseguradora" title="Agregar Aseguradora">
                                        <button class="btn btn-primary"><span class="fa fa-plus fa-lg" style="color:#FFFFFF;"></span></button>
                                    </a> 
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="card-body">
                                <input type="hidden" id="idDoc" value="">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Aseguradora</th>
                                            <th>Direccion</th>
                                            <th>Pagina</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php include("controller/modAseguradora.php")?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>