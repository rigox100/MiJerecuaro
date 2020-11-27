<?php
include_once ('../../assets/template/header.php');
require_once ('../../class/Usuario.php');
$usuario = Usuario::recuperarTodos();
?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h3>Usuarios Registrados</h3>
            <a href="save.php" class="btn btn-primary">+ Nuevo Usuario</a><br><br>
          <?php  if (count($usuario) > 0): ?>
            <table class="table table-bordered"  id="table-data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Email</th>
      <th scope="col">Estatus</th>
      <th scope="col">Rol</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($usuario as $item): 
      if($item[7]!=1):
    ?>

    <tr>
     
      <td><?php echo $item[1] ?></td>
      <td><?php echo $item[2] ?></td>
      <td><?php echo $item[3] ?></td>
      <td><?php  echo $item[5] ?></td>
      <td><?php echo $item[9] ?></td>
      <td class="text-center"><a href="save.php?idUsuario=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
      <td class="text-center"><a href="delete.php?idUsuario=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar este usuario?')" class="btn btn-danger far fa-trash-alt"></a></td> 

    </tr>
  <?php 
endif;
endforeach; ?>
  </tbody>
</table> <br>
<?php else: ?>
            <p class="alert alert-info"> No hay usuarios registrados </p>
        <?php endif; ?>
            
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