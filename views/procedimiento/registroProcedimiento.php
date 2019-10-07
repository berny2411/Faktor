<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Procedimiento</h1>
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
                            <li class="active">Registro Procedimiento</li>
                            <?php
                            }else if($_SESSION['rolUsuario']==2){
                            ?>
                            <li><a href="admin.php">Inicio</a></li>
                            <li class="active">Registro Procedimiento</li>
                            <?php
                            }else{
                            ?>
                            <li><a href="medico.php">Inicio</a></li>
                            <li class="active">Registro Procedimiento</li>
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

    <div class="row">
     <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4> Registro Procedimiento</h4>
            </div>
            <div class="card-body">
                <input type="hidden" id="idDoc" value="">
                <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab3" data-toggle="pill" href="#pills-home3" role="tab" aria-controls="pills-home" aria-selected="true">Paciente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab2" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home" aria-selected="false">Procedimiento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-profile" aria-selected="false">Documentos Paciente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact" aria-selected="false">Documentos Procedimiento</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home3" role="tabpanel" aria-labelledby="pills-home-tab">
                       <form id="alta_Paciente">

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                <input type="text" name="nPaciente" id="nPaciente" placeholder="Ingresa nombre del paciente" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                <input type="text"  name="apellidoPat" id="apellidoPat" placeholder="Ingresa apellido Parterno" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                <input type="text"  name="apellidoMat" id="apellidoMat" placeholder="Ingresa apellido materno" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-hospital-o"></i></div>
                                <input type="text"  name="hospital" id="hospital" placeholder="Ingresa hospital" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-h-square"></i></div>
                                <input type="text"  name="cuartoHospital" id="cuartoHospital" placeholder="Ingresa el cuarto de Hospital" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="text"  name="numPaciente" id="numPaciente" placeholder="Ingresa Telefono" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="text"  name="email" id="email" placeholder="Email" class="form-control">
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
                <div class="tab-pane fade" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab">

                    <form id="alta_Caso">
                       <div class="row form-group" id="newPaciente">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">Paciente</label></div>
                        <div class="col-12 col-md-6">
                            <select name="selectPas" id="selectPas" class="form-control">
                                <?php 
                                require_once("model/paciente.php");
                                $obj=new Paciente();
                                $datos=$obj->getListPaciente();
                                foreach ($datos as $key ) {
                                    ?>
                                    <option value="<?php echo $key['idPaciente']; ?>"><?php echo $key['nombrePaciente']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">Aseguradora</label></div>
                        <div class="col-12 col-md-6">
                            <select name="selectAs" id="selectAs" class="form-control">
                                <option value="0">Seleccionar</option>
                                <?php 
                                require_once("model/aseguradora.php");
                                $obj=new Aseguradora();
                                $datos=$obj->getListAseguradora2();
                                foreach ($datos as $key ) {
                                    $aseg=$obj->getListAseguradora();
                                    foreach ($aseg as $key2) {
                                        if($key['Aseguradora_idAseguradora']==$key2['idAseguradora']){

                                            ?>

                                            <option value="<?php echo $key['Aseguradora_idAseguradora']; ?>"><?php echo $key2['nombreAseguradra']; ?></option>
                                            <?php 
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                            <input type="text" name="siniestro" placeholder="siniestro" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                         <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                         <input type="text"  name="descripcion" placeholder="descripcion" class="form-control">
                     </div>
                 </div>    



                 <div class="form-group">
                    <div class="input-group">
                       <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                       <input type="text"  name="rol" placeholder="rol" class="form-control">
                   </div>
               </div>
               <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                    <input type="text" name="honorario" placeholder="honorario" class="form-control">
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

            <div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaC">Submit</button></div>

        </form>
    </div>
    <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab">
       <main role="main" class="container">

        <div class="row">
            <div class="col-md-6 col-sm-12">

                <!-- Our markup, the important part here! -->
                <div id="drag-and-drop-zoneP" class="dm-uploader p-5">
                    <h3 class="mb-5 mt-5 text-muted" align="center">Arrastra &amp; suelta el archivo aquí</h3>

                    <div class="btn btn-primary btn-block mb-5">
                        <span>Abra el buscador de archivos</span>
                        <input type="file" title='Click to add Files' accept="application/pdf" />
                    </div>
                </div><!-- /uploader -->
                <div class="mt-2">
                    <a href="#" class="btn btn-primary" id="btnApiStartP">
                        <i class="fa fa-play"></i> Iniciar
                    </a>
                </div>

            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card h-100">
                    <div class="card-header">
                        Lista de Archivos
                    </div>

                    <ul class="list-unstyled p-2 d-flex flex-column col" id="files2">
                        <li class="text-muted text-center empty">No hay archivos cargados.</li>
                    </ul>
                </div>
            </div>
        </div><!-- /file list -->
        <br>


        <div class="row">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        Mensajes
                    </div>

                    <ul class="list-group list-group-flush" id="debug2">
                        <li class="list-group-item text-muted empty">Loading plugin....</li>
                    </ul>
                </div>
            </div>
        </div> <!-- /debug -->

    </main> <!-- /container -->
    <!-- File item template -->

</div>
<div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">
   <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PDF Carta Aprobacion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> PDF Factura Honorarios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Documento XML de Factura Honorarios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-home-tab4" data-toggle="pill" href="#pills-home4" role="tab" aria-controls="pills-home" aria-selected="true">Subir Documentos</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-md-12 col-sm-4">

                <!-- Our markup, the important part here! -->
                <div id="drag-and-drop-zoneCartaAP" class="dm-uploader p-5">
                    <h3 class="mb-5 mt-5 text-muted" align="center"><p>Arrastra &amp; suelta el archivo pdf de INE aquí</p></h3>

                    <div class="btn btn-primary btn-block mb-5">
                        <span>Abra el buscador de archivos</span>
                        <input type="file" title='Click to add Files' accept="application/pdf" />
                    </div>
                </div><!-- /uploader -->

            </div>



        </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
            <div class="col-md-12 col-sm-4">

                <!-- Our markup, the important part here! -->
                <div id="drag-and-drop-zoneFacHPDf" class="dm-uploader p-5">
                    <h3 class="mb-5 mt-5 text-muted" align="center"><p>Arrastra &amp; suelta el archivo pdf Cedula Fiscal aquí</p></h3>

                    <div class="btn btn-primary btn-block mb-5">
                        <span>Abra el buscador de archivos</span>
                        <input type="file" title='Click to add Files' accept="application/pdf" />
                    </div>
                </div><!-- /uploader -->

            </div>



        </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="row">
            <div class="col-md-12 col-sm-4">

                <!-- Our markup, the important part here! -->
                <div id="drag-and-drop-zoneFacHXML" class="dm-uploader p-5">
                    <h3 class="mb-5 mt-5 text-muted" align="center"><p>Arrastra &amp; suelta el archivo pdf Caratula Bancaria aquí</p></h3>

                    <div class="btn btn-primary btn-block mb-5">
                        <span>Abra el buscador de archivos</span>
                        <input type="file" title='Click to add Files' accept="text/xml" />
                    </div>
                </div><!-- /uploader -->

            </div>



        </div>
    </div>


    <div class="tab-pane fade" id="pills-home4" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="col-md-12 col-sm-4">
            <div class="card h-100">
                <div class="card-header">
                    Lista de Archivos
                </div>

                <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                    <li class="text-muted text-center empty">No hay archivos cargados</li>
                </ul>
            </div>
            <div class="mt-3" align="center">
                <a href="#" class="btn btn-primary" id="btnApiStart">
                    <i class="fa fa-play"></i> Cargar
                </a>
                <button type="button" class="btn btn-info" id='btnFinalizarCaso'>Finalizar</button>
            </div>

        </div>

    </div>

</div>
</div>
</div>






</div>
</div>
</div>


</div>
<!-- /# column -->
</div><!-- .content -->

