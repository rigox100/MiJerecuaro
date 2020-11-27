   <div class="jumbotron">
<h4 class="display-4">Si tienes un negocio, eres un profesionista o te dedicas a algún oficio y quieres anunciarte.</h4>
  <p class="lead font-weight-bold"> Es muy sencillo, solo sigue los siguientes pasos:</p>
  <p class="lead"> 1.- Registra los datos en el formulario de solicitud.</p>
  <p class="lead"> 2.- Espera a que el administrador revise tu información y valide tus datos.</p>
  <p class="lead"> 3.- Una vez validados tus datos el administrador se pondrá en contecto contigo.</p>
  <hr>
  <p class="lead font-weight-bold text-primary"> <small>*Todas las solicitudes del municipio de Acámbaro y sus alrededores pueden postularse.  </small></p>

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Abrir formulario de solicitud
</button>
  
</div>
  

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Formulario de solicitud</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
      
            <form action="../lib/validar_solicitud.php" method="post" enctype="multipart/form-data">
     
            <div class="form-group">
            <input class="form-control" type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $usuario->getIdUsuario(); ?>">
            </div>

            <div class="form-group">
            <label for="nombre_negocio">Nombre del Negocio</label>
            <input class="form-control" type="text" name="nombre_negocio" id="nombre_negocio" value="">
            </div>

            <div class="form-group">
            <label for="url_imagen">Imagen <small class="text-info ml-2">Seleccione la imagen que desea mostrar de su negocio Ejem: Portada, Logotipo.</small></label>
            <input class="form-control" type="file" name="url_imagen" id="url_imagen">
            </div>

            
            <div class="form-group">
            <input class="form-control" type="hidden" name="rfc" id="rfc"  placeholder="Ingresa el RFC de tu negocio" value="">
            </div>

            <div class="form-group">
            <label for="tel">Télefono de contacto</label>
            <input class="form-control" type="text" name="tel" id="tel" value="">
            </div>

            <div class="form-group">
            <label for="calle">Calle</label>
            <input class="form-control" type="text" name="calle" id="calle" value="">
            </div>

            <div class="form-group">
            <label for="colonia">Colonia</label>
            <input class="form-control" type="text" name="colonia" id="colonia" value="">
            </div>

            <div class="form-group">
            <label for="cp">Código Postal</label>
            <input class="form-control" type="text" name="cp" id="cp" value="">
            </div>

            <div class="form-group">
            <label for="municipio">Localidad/Municipio</label>
          <input type="text" name="municipio" id="municipio" class="form-control" >
            </div>

            <div class="form-group">
            <label for="tel">Estado</label>
            <input class="form-control" type="text" name="estado" id="estado" value="Guanajuato" readonly>
            </div>

            <div class="form-group">
            <label for="descripcion">Cuentanos un poco de tu negocio</label>
           <textarea name="descripcion" id="descripcion" rows="4" class="form-control"></textarea>
            </div>

            <div class="form-group">
            <input type="submit" value="Enviar solicitud" class="btn btn-primary">
            </div>
            

            </form>

            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>