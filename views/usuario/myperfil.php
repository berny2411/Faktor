<?php
require_once('model/usuario.php');
require_once("model/archivos.php");
$obj = new Usuario();
$obj2 = new Archivos();
$datos=$obj2-> getUserById();
$correo= $_SESSION['usuario'];
foreach ($datos as $key ) {
  if ($correo==$key['idDocumentosPersonal']){   
    $url=$key['urlArchivo'];
  }
}   
$fotito='images/admin.jpg';              
$filepath = sprintf('%s/',$url);
$carpeta=substr($filepath, 3);;
if(is_dir($carpeta)){
  if($dir = opendir($carpeta)){
    while(($archivo = readdir($dir)) !== false){
      if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
        $extension=substr($archivo, -3);
        if($extension=='jpg'){
            $fotito=$carpeta.$archivo;
          } else{

          }
        
     }
   }
   closedir($dir);
 }
}
    
    $id=$_SESSION['idUsuario'];
  $users  = $obj -> getUserById($id);

  if($users){
    $nombre =$users[0]['nombreUsuario'];
    $apellidoP =$users[0]['apellidoPatUsuario'];
    $apellidoM   =$users[0]['apellidoMatUsuario'];
    $dir=$users[0]['direccionUsuario'];
    $numTel=$users[0]['numTelefonoUsuario'];

  }
    ?>
<div class="content">
    <div class="animated fadeIn">
        <style type="text/css">
            #button-container{
             display:block;
             position:relative;
             margin:auto;
         }

         #button-container a{
            position: absolute;
            margin: auto;
            bottom:0.5em;
            right:0.5em;
            background-color:#007bff;;
            border-radius:2em;
            color:white;
            padding:1em 1em;
        }
    </style>

    <div class="row">
     <input type="hidden" id="idDoc" value="">
     <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Mi Perfil</strong>
            </div>
            <div class="card-body">
                <div class="col-md-3 mx-auto">
                    <div id="button-container"> 
                        <img class="rounded-circle mx-auto d-block" width="200" height="200" src="<?php echo $fotito?>" alt="Imagen de Perfil">
                        <a href="medico.php?page=documentos/fotoPerfil" alt="Editar"><i class="fa fa-pencil fa-lg"></i></a>
                    </div>
                </div>
                <hr>
                <div class="alert alert-secondary text-center" role="alert">
                                       <strong >Informacion Personal</strong>
                                    </div>
                 <form id="perfil">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" name="nombre" placeholder="" class="form-control" value="<?php echo $_SESSION['nombreUsuario']?>" disabled="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text"  name="apellidoPat" placeholder="Ingrese apellidoPat" class="form-control" value="<?php echo $apellidoP;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text"  name="apellidoMat" placeholder="Ingrese apellidoMat" class="form-control" value="<?php echo $apellidoM;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text"  name="direccion" placeholder=" direccion" class="form-control" value="<?php echo $dir;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="text"  name="telefono" placeholder="telefono" class="form-control" value="<?php echo $numTel;?>">
                                        </div>
                                    </div>

                                    <div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="myperfil">Guardar</button></div>

                                </form>
        
            </div>
        </div>
    </div>
</div>


</div><!-- .animated -->
</div><!-- .content -->


