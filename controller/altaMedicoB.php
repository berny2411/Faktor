  <?php 


  $numC  = $_POST['numCuenta'];
  $banco = $_POST['bancoAfiliado'];
 
  	if(empty($numC) || empty($banco) )
  {

    echo 1; // Un campo esta vacio y es obligatorio

  }else{
  	require_once('../model/usuario.php');
  	
  	$altausuario = new Usuario();

  	$update=$altausuario -> updateUsuarioB($numC, $banco);
    if($update){
      echo 'Exitoso';
    }else{
      echo 'Fallido';
    }
  }
?>
