<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reestablecer contraseña</h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body">
        <form action="../lib/validar_cambio_password.php" method="post">
        <div class="form-group">
           <input type="hidden" name="recovery" id="recovery" class="form-control" value="1">
           <input type="hidden" name="token" id="token" class="form-control" value="<?php echo $token; ?>">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="" required>
          </div>
          <div class="form-group">
            <label for="new_passsword">Ingresa una nueva contraseña</label>
            <input type="password" name="new_password" id="new_password" class="form-control" value="" required>
          </div>
          <!--
          <div class="form-group">
          <label for="new_passsword">Confirmar Contraseña</label>
            <input type="password" name="confirmar_pasword" id="confirmar_password" class="form-control" value="">
          </div>
           -->
          <div class="form-group">
              <button type="submit" class="btn btn-primary w-100">Cambiar contraseña</button>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-secondary">Cancelar </a>
      </div>
    </div>
  </div>
</div>