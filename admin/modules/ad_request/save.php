<?php
require_once '../../class/Solicitud.php';
require_once '../../class/Anuncio.php';


$idSolicitud = (isset($_REQUEST['idSolicitud'])) ? $_REQUEST['idSolicitud'] : null;
$solicitud = solicitud::buscarPorIdSolicitud($idSolicitud);
$actualizar_solicitud = new Solicitud();
$anuncio = new Anuncio();

//var_dump($solicitud);  


//Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $idSolicitud = (isset($_POST['idSolicitud'])) ? $_POST['idSolicitud'] : null;
  $nombre_negocio = (isset($_POST['nombre_negocio'])) ? $_POST['nombre_negocio'] : null;
  $url_image = (isset($_POST['url_image'])) ? $_POST['url_image'] : null;
  $rfc = (isset($_POST['rfc'])) ? $_POST['rfc'] : null;
  $calle = (isset($_POST['calle'])) ? $_POST['calle'] : null;
  $colonia = (isset($_POST['colonia'])) ? $_POST['colonia'] : null;
  $cp = (isset($_POST['cp'])) ? $_POST['cp'] : null;
  $telefono = (isset($_POST['tel'])) ? $_POST['tel'] : null;
  $municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : null;
  $estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;
  $estatus_solicitud = (isset($_POST['estatus_solicitud'])) ? $_POST['estatus_solicitud'] : null;
  $observaciones = (isset($_POST['observaciones'])) ? $_POST['observaciones'] : null;
  if ($estatus_solicitud == "Aceptada") {
    $observaciones = "";
  }
  $actualizar_solicitud->setIdSolicitud($idSolicitud);
  $actualizar_solicitud->setEstatusSolicitud($estatus_solicitud);
  $actualizar_solicitud->setObservaciones($observaciones);
  $actualizar_solicitud->actualizarEstadoSolicitud();

  if ($estatus_solicitud != "Publicada") {
    $anuncio->eliminarPorIdSolicitud($idSolicitud);
  }

  header('Location: index.php');
}
include_once '../../assets/template/header.php';
?>

<!-- Main content -->
<div class="content" id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a href="index.php" class="btn btn-info">Regresar</a><br>
        <div style="width:70%; margin-left:15%; background-color: white; padding:20px; border-radius:10px; font-size: 18px;">
          <?php
          foreach ($solicitud as $item) :
          ?>

            <h2 class="text-center display-4"> <?php echo $item[1] ?> <a href="" class="btn btn-dark float-right">Imprimir solicitud</a> </h2>

            <img src="../posts/<?php echo $item[2]; ?>" alt="<?php echo $item[1] ?>" class="d-block mx-auto img-fluid w-50 img-anuncio">

            <form action="" method="post">
              <div class="form-group">
                <input class="form-control" type="hidden" name="idSolicitud" id="idSolicitud" value="<?php echo $item[0]; ?>" readonly>
              </div>


              <div class="form-group">
                <input class="form-control" type="hidden" name="nombre_negocio" id="nombre_negocio" value="<?php echo $item[1]; ?>" readonly>
              </div>

              <div class="form-group">
                <input class="form-control" type="hidden" name="url_image" id="url-image" value="<?php echo $item[2]; ?>" readonly>
              </div>

              <div class="form-group">
                <input class="form-control" type="hidden" name="descripcion" id="descripcion" value="<?php echo $item[12]; ?>" readonly>
              </div>
              <!--
    <div class="form-group">
      <label for="rfc">RFC</label>
            <input class="form-control input-clean" type="text" name="rfc" id="rfc" value="" readonly >
    </div>
-->

              <div class="form-group">
                <label for="tel">Teléfono</label>
                <input class="form-control input-clean" type="text" name="tel" id="tel" value="<?php echo $item[4] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="calle">Dirección</label>
                <input class="form-control input-clean" type="text" name="calle" id="calle" value="<?php echo $item[5] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="colonia">Colonia</label>
                <input class="form-control input-clean" type="text" name="colonia" id="colonia" value="<?php echo $item[6] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="cp">Código Postal</label>
                <input class="form-control input-clean" type="text" name="cp" id="cp" value="<?php echo $item[7] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="municipio">Municipio</label>
                <input class="form-control input-clean" type="text" name="munucipio" id="municipio" value="<?php echo $item[8] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="estado">Estado</label>
                <input class="form-control input-clean" type="text" name="estado" id="estado" value="<?php echo $item[9] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="estado">Estatus actual de la solicitud</label>
                <?php
                if ($item[10] == 'En proceso') {
                  echo '<p class="alert alert-secondary text-center w-50">' . $item[10] . '</p>';
                } elseif ($item[10] == 'Aceptada') {
                  echo '<p class="alert alert-primary text-center w-50">' . $item[10] . '</p>';
                } elseif ($item[10] == 'Publicada') {
                  echo '<p class="alert alert-success text-center w-50">' . $item[10] . '</p>';
                } else {
                  echo '<p class="alert alert-danger text-center w-50">' . $item[10] . '</p>';
                }
                ?>
              </div>
              <?php
              if ($item[11] == 'Publicada') {
                echo '<p class="alert alert-warning"> <strong>Advertencia:</strong> Si cambia el estatus de una solicitud que ha sido publicada esta ya no estará disponible en anuncios hasta que vuelva a ser aceptada y publicada, realice esta acción con precacución.</p>';
              }
              ?>

              <div class="form-group">
                <label for="estatus_solicitud">Cambiar estatus</label>
                <select name="estatus_solicitud" id="estatus_solicitud" class="form-control">
                  <option value="En proceso" <?php if ($item[10] == "En proceso") {
                                                echo 'selected';
                                              } ?>>En Proceso</option>
                  <option value="Aceptada" <?php if ($item[10] == "Aceptada") {
                                              echo 'selected';
                                            } ?>>Aceptada</option>
                  <option value="Rechazada" <?php if ($item[10] == "Rechazada") {
                                              echo 'selected';
                                            } ?>>Rechazada</option>
                  <?php
                  if ($item[10] == 'Publicada') {
                  ?>
                    <option value="Publicada" <?php if ($item[10] == "Publicada") {
                                                echo 'selected';
                                              } ?>>Publicada</option>
                  <?php
                  }
                  ?>
                </select>
              </div>


              <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="observaciones" rows="3"><?php echo $item[13]; ?></textarea>
              </div>
              <div class="form-group">
                <input type="submit" onclick="return confirm('¿Desea guardar los cambios de esta solicitud?')" class="btn btn-primary w-100" value="Guardar cambios">
              </div>

            </form>


          <?php
          endforeach;
          ?>


        </div>


      </div>

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once '../../assets/template/footer.php';

?>