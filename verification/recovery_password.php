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
    <title>Reestablecer Password</title>
</head>
<body>

<?php

if(isset($_REQUEST['token'])){

    require_once '../admin/class/Usuario.php';
    

    $token = (isset($_REQUEST['token'])) ? $_REQUEST['token'] : null;

    $registro = new Usuario;
    $registro->setToken($token);
    if($registro->verificar_token_activo()){
        if(true){
            ?>
            <script>
      $(document).ready(function()
      {
        $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false}); 
         $("#exampleModalCenter").modal("show");
        
      });
</script>
        <?php
        include_once "../template/partials/frm_cambiar_password.php";
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

</body>
</html>