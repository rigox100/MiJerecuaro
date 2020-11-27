<?php

require_once '../../class/Categoria.php';
//require_once '../../class/Rol.php';
//$rol = Rol::recuperarTodos();

    $idCategoria = (isset($_REQUEST['idCategoria'])) ? $_REQUEST['idCategoria'] : null;
    $edit= isset($_GET['edit']) ? $_GET['edit'] : false;

    if($idCategoria){        
        $categoria = Categoria::buscarPorId($idCategoria);        
    }else{
        $categoria = new Categoria();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
     
        $categoria->setNombre($nombre);
        $categoria->setDescripcion($descripcion);
       
        $categoria->guardar();
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

          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
          <?php    if($edit): ?>
            <h4 class="text-center">Editar clasificación</h4> <br>
          <?php else: ?>
            <h4 class="text-center">Registrar clasificación</h4> <br>
          <?php endif; ?>
            <form action="save.php" method="post">

             <div class="form-group">
            <input class="form-control" type="hidden" name="idCategoria" id="idCategoria" value="<?php echo $categoria->getIdCategoria(); ?>">
            </div>

            <div class="form-group">
            <label for="nombre">Título de la clasificación</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $categoria->getNombre(); ?>" required>
            </div>

            <div class="form-group">
            <label for="descripcion">Descripción</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required><?php echo $categoria->getDescripcion(); ?></textarea>
            </div>  

            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
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