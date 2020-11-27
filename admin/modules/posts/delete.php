<?php
    
     require_once '../../class/Anuncio.php';
     require_once '../../class/Solicitud.php';
    
    $idAnuncio = (isset($_REQUEST['idAnuncio'])) ? $_REQUEST['idAnuncio'] : null;
    $idSolicitud = (isset($_REQUEST['idSolicitud'])) ? $_REQUEST['idSolicitud'] : null;
    

    if($idSolicitud!=NULL){
        $mensaje = 'Su solicitud ha sido vuelta a poner en proceso debido a una actualización en el sistema, en breve será revisada';
        $estatus_solicitud = 'En proceso';
        $solicitud = Solicitud::buscarPorId($idSolicitud);
        $solicitud->setEstatusSolicitud($estatus_solicitud);
        $solicitud->setObservaciones($mensaje);
        $solicitud->actualizarEstadoSolicitud();
        
    }



    if($idAnuncio){
        $anuncio = Anuncio::buscarPorId($idAnuncio);        
        $anuncio->eliminar();
        if($idSolicitud==NULL){
        unlink($anuncio->getUrlImagen()); 
        }else{

        }
        header('Location: index.php');
            
    }
    
?>