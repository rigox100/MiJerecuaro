<!-- Modal -->
<div class="modal fade" id="ModalEmailRecovery" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reestablecer contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
          <input type="hidden" name="recovery" value="1">
        <label for="email">Ingrese el correo electrónico con el que registro su cuenta.</label>
          <input type="email" class="form-control" name="email" id="email" value="" required>
        </div>
          
        <div class="form-group">
        <button type="submit" class="btn btn-warning w-100">Enviarme un correo para reestablecer mi contrseña</button>
        </div>
         
         
        </form>
      </div>
      <div class="modal-footer">
        
       
      </div>
    </div>
  </div>
</div>