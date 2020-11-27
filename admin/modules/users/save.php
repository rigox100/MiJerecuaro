<?php
session_start();
require_once '../../class/Usuario.php';
require_once '../../class/Rol.php';
$rol = Rol::recuperarTodos();

    $idUsuario = (isset($_REQUEST['idUsuario'])) ? $_REQUEST['idUsuario'] : null;
    
    if($idUsuario){        
        $usuario = Usuario::buscarPorId($idUsuario);        
    }else{
        $usuario = new Usuario();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : null;
        $email = (isset($_POST['email'])) ? $_POST['email'] : null;
        $token = md5($email);
        if($_POST['new_password']==null){
          $password = (isset($_POST['old_password'])) ? $_POST['old_password'] : null;
        }else{
           $password = md5((isset($_POST['new_password'])) ? $_POST['new_password'] : null);
        }
        $estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : null;
        $idRol = (isset($_POST['idRol'])) ? $_POST['idRol'] : null;
        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setEmail($email);
        $usuario->setPassword($password);
        $usuario->setEstatus($estatus);
        $usuario->setToken($token);
        $usuario->setIdRol($idRol);
        $usuario->guardar();
        if($_SESSION['idRol']!=3){
        header('Location: index.php');
        }else{
          //Actualiza session del suscriptor y redirige
          $_SESSION['nombre'] = $nombre;
          header('Location: ../../../user_account/perfil.php?message=OK');
        }
        
    }
include_once '../../assets/template/header.php';
?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <a href="index.php" class="btn btn-info">Regresar</a><br>

          <?php 
          if (isset($_REQUEST['idUsuario'])){

            $title = 'Editar';
          }else{
            $title = 'Registrar nuevo';
          }
          ?>

          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
            <h4 class="text-center"><?php echo $title ?> usuario</h4> <br>
            <form action="save.php" method="post">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $usuario->getIdUsuario(); ?>">
            </div>

            <div class="form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $usuario->getNombre(); ?>" required>
            </div>

            <div class="form-group">
            <label for="apellido">Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo $usuario->getApellido(); ?>" required>
            </div>

            <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $usuario->getEmail(); ?>" required>
            </div>
            
            <div class="form-group">
            <label for="password">Contraseña</label>
            <?php if (!$usuario->getPassword()){ ?>
            <input class="form-control" type="password" name="new_password" id="password" value="" required>
            <?php }else{ ?>
              <input class="form-control" type="hidden" name="old_password"  value="<?php echo $usuario->getPassword()?>">
              <div><a  class="btn btn-danger" data-toggle="collapse" href="#collapsePasswordReset" role="button" aria-expanded="false" aria-controls="collapsePasswordReset">Reestablecer</a></div>
              <div class="collapse" id="collapsePasswordReset">
                <div class="card card-body">
                <input class="form-control" type="password" name="new_password" id="password" placeholder="Ingrese la nueva contraseña" value="">
             </div>
            <?php
            }
             ?>
            </div>
            <div class="form-group">
            <label for="estatus">Estatus</label>
            <select class="form-control" name="estatus" id="estatus" required>
                <option value="">Selecciona una opción</option>
                <option value="Activo" <?php if($usuario->getEstatus()=='Activo'){ echo 'Selected';}?>>Activo</option>
                <option value="Inactivo" <?php if($usuario->getEstatus()=='Inactivo'){ echo 'Selected';}?>>Inactivo</option>
            </select>
            </div>

            <div class="form-group">
            <label for="idRol">Rol</label>
            <select class="form-control" name="idRol" id="idRol" required>
            <option value="">Selecciona una opción</option>
            <?php foreach ($rol as $item): ?>
                <option value="<?php echo $item[0]; ?>"  <?php if($usuario->getIdRol()==$item[0]){ echo 'Selected';}?>> <?php echo $item[1];?></option>
            <?php
              endforeach;
            ?>
            </select>
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="Guardar">
            </div>  
           
            </form>
            


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