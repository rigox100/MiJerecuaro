<?php 
require_once '../admin/class/Usuario.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
   if($_POST['recovery']==1){

   $email = (isset($_POST['email'])) ? $_POST['email'] : null;
  $password = md5((isset($_POST['new_password'])) ? $_POST['new_password'] : null);
  $token = (isset($_POST['token'])) ? $_POST['token'] : null;


    $registro = new Usuario();
    $registro->setEmail($email);
    $registro->setPassword($password);
    $registro->setToken($token);
    if($registro->reestablecer_password()){
        header('Location: ../login.php?message=recovery-success');

    }else{
      header('Location: ../index.php');

    }
    


   }else{
    header('Location: ../index.php');

   }


    }


