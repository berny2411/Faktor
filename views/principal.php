<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
       <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row toolbar">
                                    <div class="col-5">
                                        <strong class="card-title">Listado de Procedimientos</strong>
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="card-body">
                                <input type="hidden" id="idDoc" value="">
                               <div class="table-stats order-table ov-h">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered ">
                                    <thead align="center">
                                        <tr>
                                            <th>#</th>
                                            <th>Médico</th>
                                            <th>Paciente</th>
                                            <th>Siniestro</th>
                                            <th>Fecha</th>
                                            <th>Rol del médico</th>
                                            <th>Honorarios</th>
                                            <th>Status</th>
                                            <th width="110%">Opciones &nbsp;&nbsp;&nbsp;</th>


                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                    <?php include("controller/consultaProcedimiento.php")?>
                                    </tbody>
                                </table>
                            </div>
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