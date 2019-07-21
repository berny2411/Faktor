
    
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Consulta Aseguradora</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Menu</a></li>
                                    <li><a href="#">Aseguradora</a></li>
                                    <li class="active">Consulta Aseguradora</li>
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
                                    <div class="col-1">
                                        <strong class="card-title"></strong>
                                    </div>
                                    <div class="col-1">
                                      <a href="./admin.php?page=aseguradora/registroAseguradora" title="Agregar Aseguradora">
                                        <input type="image" src="img/nuevo.png" class="btn btn-primary">
                                    </a>  
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="card-body">
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
                                    <?php include("controller/consultaAseguradora.php")?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

