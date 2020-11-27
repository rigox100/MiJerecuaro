<?php 
session_start();
require_once '../admin/class/Usuario.php';


 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = (isset($_POST['email'])) ? $_POST['email'] : null;
    $password = md5((isset($_POST['password'])) ? $_POST['password'] : null);
    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setPassword($password);
    if($usuario->logIn()){

        if($_SESSION['idRol']!=3){

            header('Location: ../admin/index.php');
        }else{

            header('Location: ../index.php');
        }


    }else{

        header('Location: ../login.php?message=error');
        
    }

}