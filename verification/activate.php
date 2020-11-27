<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Registro</title>
</head>
<body>

<?php

if(isset($_REQUEST['token'])){

    require_once '../admin/class/Usuario.php';

    $token = (isset($_REQUEST['token'])) ? $_REQUEST['token'] : null;

    $registro = new Usuario;
    $registro->setToken($token);
    if($registro->verificar_token()){
        if($registro->actualizar_estatus()){
            ?>
            <script>
      $(document).ready(function()
      {
        $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false}); 
         $("#exampleModalCenter").modal("show");
        
      });
</script>
        <?php
        }else{
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
  
    }

}else{
    header('Location: ../index.php');
}
?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Activación éxitosa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Su cuenta se ha activado correctamente.</p>
      </div>
      <div class="modal-footer">
        <a href="../login.php" class="btn btn-primary">Iniciar sesión en MiAcambaro </a>
      </div>
    </div>
  </div>
</div>
</body>
</html>