<?php

  session_start();

  if($_SESSION['rolUsuario'] == 1){
    header('location: admin.php');
  }else if($_SESSION['rolUsuario'] == 2){
    header('location: ../views/user/index.php');
  }

 ?>
