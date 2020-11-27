<?php
include_once '../../class/Solicitud.php';
include_once '../../class/Anuncio.php';
require_once '../../class/Categoria.php';
$categoria = Categoria::recuperarTodos();
$actualizar_solicitud = new Solicitud();
$anuncio = new Anuncio();

$idSolicitud = (isset($_REQUEST['idSolicitud'])) ? $_REQUEST['idSolicitud'] : null;


$solicitud = solicitud::buscarPorId($idSolicitud);
//var_dump($solicitud);  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Información para la actualización de la solicitud
  $idSolicitud = (isset($_POST['idSolicitud'])) ? $_POST['idSolicitud'] : null;
  $estatus_solicitud = (isset($_POST['estatus_solicitud'])) ? $_POST['estatus_solicitud'] : null;
  //------------------------------------------

  //Información para registrar el anuncio
  $idCategoria = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : null;
  $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : null;
  $municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : null;
  $estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;
  $calle = (isset($_POST['calle'])) ? $_POST['calle'] : null;
  $colonia = (isset($_POST['colonia'])) ? $_POST['colonia'] : null;
  $cp = (isset($_POST['cp'])) ? $_POST['cp'] : null;
  $tel = (isset($_POST['tel'])) ? $_POST['tel'] : null;
  $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : null;
  $instagram = (isset($_POST['instagram'])) ? $_POST['instagram'] : null;
  $youtube = (isset($_POST['youtube'])) ? $_POST['youtube'] : null;
  $sitio = (isset($_POST['sitio'])) ? $_POST['sitio'] : null;
  $google_maps = (isset($_POST['google_maps'])) ? $_POST['google_maps'] : null;
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
  $primer_dia_sem = (isset($_POST['primer_dia_sem'])) ? $_POST['primer_dia_sem'] : null;
  $ultimo_dia_sem = (isset($_POST['ultimo_dia_sem'])) ? $_POST['ultimo_dia_sem'] : null;
  $entrada = (isset($_POST['entrada'])) ? $_POST['entrada'] : null;
  $cierre = (isset($_POST['cierre'])) ? $_POST['cierre'] : null;
  $estatus_anuncio = (isset($_POST['estatus_anuncio'])) ? $_POST['estatus_anuncio'] : null;
  $destacado = (isset($_POST['destacado'])) ? $_POST['destacado'] : null;
  $keywords = (isset($_POST['keywords'])) ? $_POST['keywords'] : null;
  $url = (isset($_REQUEST['url'])) ? $_REQUEST['url'] : null;
  $fecha_publicacion = date('Y-m-d');


  $anuncio->setIdCategoria($idCategoria);
  $anuncio->setTitulo($titulo);
  $anuncio->setUrlImagen($url);
  $anuncio->setMunicipio($municipio);
  $anuncio->setEstado($estado);
  $anuncio->setCalle($calle);
  $anuncio->setColonia($colonia);
  $anuncio->setCp($cp);
  $anuncio->setTelefono($tel);
  $anuncio->setFacebook($facebook);
  $anuncio->setInstagram($instagram);
  $anuncio->setYoutube($youtube);
  $anuncio->setSitio($sitio);
  $anuncio->setGoogleMaps($google_maps);
  $anuncio->setDescripcion($descripcion);
  $anuncio->setPrimerDiaSem($primer_dia_sem);
  $anuncio->setUltimoDiaSem($ultimo_dia_sem);
  $anuncio->setEntrada($entrada);
  $anuncio->setCierre($cierre);
  $anuncio->setEstatusAnuncio($estatus_anuncio);
  $anuncio->setKeywords($keywords);
  $anuncio->setFechaPublicacion($fecha_publicacion);
  $anuncio->setDestacado($destacado);
  $anuncio->setIdSolicitud($idSolicitud);
  $anuncio->guardar();

  //Actualizar solicitud
  $actualizar_solicitud->setIdSolicitud($idSolicitud);
  $actualizar_solicitud->setEstatusSolicitud('Publicada');
  $actualizar_solicitud->setObservaciones(NULL);
  $actualizar_solicitud->actualizarEstadoSolicitud();


  header('Location: index.php?message=success&negocio=' . $titulo);
}

include_once '../../assets/template/header.php';
?>


<!-- Main content -->
<div class="content" id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a href="index.php" class="btn btn-info">Regresar</a><br>

        <div style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">

          <p class="alert alert-primary">El anuncio del usuario está a punto de ser publicado, seleccione la Clasificación que mejor se describa al negocio, en caso de no existir puede <a href="../posts_categories/index.php" target="_blank"> crear una clasificación nueva </a> y asignela.</p>

          <h4 class="text-center display-4">Publicar Anuncio de <?php echo $solicitud->getNombreNegocio(); ?> </h4> <br>


          <form action="publicar.php" method="post">

            <img src="../posts/<?php echo $solicitud->getUrlImagen() ?>" class="d-block mx-auto img-fluid w-50 img-anuncio">

            <div class="form-group">
              <input class="form-control" type="hidden" name="idSolicitud" id="idSolicitud" value="<?php echo $solicitud->getIdSolicitud(); ?>" readonly>
            </div>

            <div class="form-group">
              <input class="form-control" type="hidden" name="url" id="url" value="<?php echo $solicitud->getUrlImagen(); ?>">
            </div>

            <div class="form-group">
              <label for="idCategoria">Clasificación</label>
              <select class="form-control" name="idCategoria" id="idCategoria">
                <option value="">Selecciona una opción</option>
                <?php foreach ($categoria as $item) : ?>
                  <option value="<?php echo $item[0]; ?>"> <?php echo $item[1]; ?> </option>
                <?php
                endforeach;
                ?>
              </select>
            </div>


            <div class="form-group">
              <label for="keywords">Palabras Clave</label>
              <textarea class="form-control" name="keywords" id="keywords" rows="5"></textarea>
            </div>

            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Mostrar toda la información
            </a>

            <div class="collapse" id="collapseExample">
              <div class="form-group">
                <label for="titulo">Título (Negocio, Profesión u oficio)</label>
                <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $solicitud->getNombreNegocio(); ?>" readonly>
              </div>


              <div class="form-group">
                <label for="municipio">Municipio/Localidad</label>
                <input type="text" class="form-control" name="municipio" id="municipio" value="<?php echo $solicitud->getMunicipio(); ?>" readonly>
              </div>

              <div class="form-group">
                <label for="estado">Estado</label>
                <input class="form-control" type="text" name="estado" id="estado" value="Guanajuato" readonly>
              </div>

              <div class="form-group">
                <label for="calle">Calle</label>
                <input class="form-control" type="text" name="calle" id="calle" value="<?php echo $solicitud->getCalle(); ?>" readonly>
              </div>

              <div class="form-group">
                <label for="colonia">Colonia</label>
                <input class="form-control" type="text" name="colonia" id="colonia" value="<?php echo $solicitud->getColonia(); ?>" readonly>
              </div>

              <div class="form-group">
                <label for="cp">Código Postal</label>
                <input class="form-control" type="text" name="cp" id="cp" value="<?php echo $solicitud->getCP(); ?>" readonly>
              </div>

              <div class="form-group">
                <label for="nombre">Teléfono</label>
                <input class="form-control" type="text" name="tel" id="tel" value="<?php echo $solicitud->getTel(); ?>" readonly>
              </div>

              <div class="form-group">
                <label for="facebook">Facebook <small>(Opcional)</small></label>
                <input class="form-control" type="text" name="facebook" id="facebook" placeholder="Ingresa enlace de la cuenta de facebook" value="">
              </div>

              <div class="form-group">
                <label for="instagram">Instagram <small>(Opcional)</small></label>
                <input class="form-control" type="text" name="instagram" id="instagram" placeholder="Ingresa enlace de la cuenta de Instagram" value="">
              </div>

              <div class="form-group">
                <label for="youtube">Youtube <small>(Opcional)</small></label>
                <input class="form-control" type="text" name="youtube" id="youtube" placeholder="Ingresa enlace de la cuenta de Instagram" value="">
              </div>

              <div class="form-group">
                <label for="nombre">Sitio Web <small>(Opcional)</small> </label>
                <input class="form-control" type="text" name="sitio" id="sitio" value="" placeholder="Ingresa el enlace a tu sitio web">
              </div>

              <div class="form-group">
                <label for="google_maps">Google Maps <small>(Opcional)</small></label>
                <input class="form-control" type="text" name="google_maps" id="google_maps" placeholder="Ingresa enlace del negocio en Google Maps" value="">
              </div>

              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="5" readonly><?php echo $solicitud->getDescripcion(); ?></textarea>
              </div>


              <div class="form-group">
                <label>Horario</label> <br><br>


                <label for="primer_dia_sem">De:</label>

                <select name="primer_dia_sem" id="primer_dia_sem" class="form-control" style="width: 60%;">
                  <option value="">Selecciona una opción</option>
                  <option value="Lunes">Lunes</option>
                  <option value="Martes">Martes</option>
                  <option value="Miércoles">Miércoles</option>
                  <option value="Jueves">Jueves</option>
                  <option value="Viernes">Viernes</option>
                  <option value="Sábado">Sábado</option>
                  <option value="Domingo">Domingo</option>
                </select>


                <label for="ultimo_dia_sem">a:</label>
                <select name="ultimo_dia_sem" id="ultimo_dia_sem" class="form-control" style="width: 60%;">
                  <option value="">Selecciona una opción</option>
                  <option value="Lunes">Lunes</option>
                  <option value="Martes">Martes</option>
                  <option value="Miércoles">Miércoles</option>
                  <option value="Jueves">Jueves</option>
                  <option value="Viernes">Viernes</option>
                  <option value="Sábado">Sábado</option>
                  <option value="Domingo">Domingo</option>
                </select>

                <br>
                <label>Abierto desde: </label><input class="form-control" type="time" name="entrada" id="entrada" value="00:00" min="00:00" max="24:00" step="3600" style="width: 60%;">
                <label>Hasta: </label><input class="form-control" type="time" name="cierre" id="cierre" value="00:00" min="00:00" max="24:00" step="3600" style="width: 60%;">
              </div>

              <div class="form-group">
                <input class="form-control" type="hidden" name="estatus_anuncio" id="estatus_anuncio" value="Publicado">
              </div>

              <div class="form-group">
                <input class="form-control" type="hidden" name="destacado" id="destacado" value="No">
              </div>

            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" class="btn btn-success w-100" value="Guardar cambios y publicar">
            </div>

          </form>


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