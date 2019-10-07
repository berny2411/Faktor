<?php

  session_start();

  if($_SESSION['rolUsuario'] == 1){
    header('location: master.php');
  }else if($_SESSION['rolUsuario'] == 2){
    header('location: admin.php');
  }else if($_SESSION['rolUsuario'] == 3){
    if($_SESSION['status']==0){
    header('location: rellenadoMedico.php');
   }else {
    header('location: medico.php');
   }
  }else{
     header('location: index.php');
  }

 ?>