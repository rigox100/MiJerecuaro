<?php
    session_start();
     require_once '../../class/Solicitud.php';
    
    $idSolicitud = (isset($_REQUEST['idSolicitud'])) ? $_REQUEST['idSolicitud'] : null;
    
    //echo $idSolicitud;

    if($idSolicitud){
        $solicitud = Solicitud::buscarPorId($idSolicitud);        
        $solicitud->eliminar();
        if($_SESSION['idRol']== 3){
        header('Location: ../../../user_account/mi_negocio.php');
        }else{
        header('Location: index.php');
        }     
    }
    
?>