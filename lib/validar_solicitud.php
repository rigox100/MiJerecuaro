<?php
session_start();
require_once '../admin/class/Solicitud.php';

$idSolicitud = (isset($_REQUEST['idSolicitud'])) ? $_REQUEST['idSolicitud'] : null;
if($idSolicitud){        

  $solicitud = Solicitud::buscarPorId($idSolicitud);        
}else{
  $solicitud = new Solicitud();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idUsuario = $_SESSION['idUsuario'];
    $nombre_negocio = (isset($_POST['nombre_negocio'])) ? $_POST['nombre_negocio'] : null;
    $url_imagen1 = (isset($_POST['url-imagen1'])) ? $_POST['url-imagen1'] : null;
    $rfc = (isset($_POST['rfc'])) ? $_POST['rfc'] : null;
    $tel = (isset($_POST['tel'])) ? $_POST['tel'] : null;
    $calle = (isset($_POST['calle'])) ? $_POST['calle'] : null;
    $colonia = (isset($_POST['colonia'])) ? $_POST['colonia'] : null;
    $cp = (isset($_POST['cp'])) ? $_POST['cp'] : null;
    $municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : null;
    $fecha_solicitud = date('Y-m-d');
    $estatus_solicitud = "En Proceso";
    if($idSolicitud){
      $observaciones = 'Ajustes realizados para revisión';
    }else{
      $observaciones = NULL;
    }
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
    
    if($_FILES['url_imagen']['name']!=null) {

        if($_FILES['url_imagen']['type'] ==  'image/jpg' ||  $_FILES['url_imagen']['type']  == 'image/jpeg' 
          ||  $_FILES['url_imagen']['type']  == 'image/png'){ 
            
              if (!is_dir('../admin/modules/posts/uploads/images')) {
                mkdir('../admin/modules/posts/uploads/images', 0777, true); //true es para que pueda crear directorios recursivos, osea uno dentro de otro
              }

              $rutaServidor = 'uploads/images';
              $rutaTemporal = $_FILES['url_imagen']['tmp_name'];
              $nombreImagen = $_FILES['url_imagen']['name'];

              $rutaDestino = $rutaServidor.'/'.$nombreImagen;
              move_uploaded_file($rutaTemporal, '../admin/modules/posts/'.$rutaDestino);
              $solicitud->setUrlImagen($rutaDestino);
            }

          }else{
            $solicitud->setUrlImagen($url_imagen1);
          }
       
    $solicitud->setIdUsuario($idUsuario);
    $solicitud->setNombreNegocio($nombre_negocio);
    $solicitud->setRFC($rfc);
    $solicitud->setTel($tel);
    $solicitud->setCalle($calle);
    $solicitud->setColonia($colonia);
    $solicitud->setCP($cp);
    $solicitud->setMunicipio($municipio);
    $solicitud->setFechaSolicitud($fecha_solicitud);
    $solicitud->setEstatusSolicitud($estatus_solicitud);
    $solicitud->setDescripcion($descripcion);
    $solicitud->setObservaciones($observaciones); 
    $solicitud->guardar();
    header('Location: ../user_account/mi_negocio.php?message=success');   
      
        }else{
              header('Location: ../user_account/ajustes_solicitud.php?error=1');
        } 
      
      
    