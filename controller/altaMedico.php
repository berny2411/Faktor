  <?php 

  $paterno  = $_POST['apellidoPat'];
  $materno  = $_POST['apellidoMat'];
 $RFC  = $_POST['rfc'];
  $direccion  = $_POST['direccion'];
  $telefono  = $_POST['telefono'];

  if(empty($paterno) || empty($telefono)||empty($RFC)){

    echo 1; // Un campo esta vacio y es obligatorio

  }else{
  	require_once('../model/usuario.php');
  	
  	$altausuario = new Usuario();

  	$result=$altausuario -> updateUsuario($paterno, $materno,$direccion,$telefono,$RFC);
    if($result){
      echo 'Exitoso';
    }else{
      echo 'Fallido';
    }
  }
?>
