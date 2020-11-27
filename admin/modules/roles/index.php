<?php
include_once '../../assets/template/header.php';
require_once ('../../class/Rol.php');
$rol = Rol::recuperarTodos();
?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <div class="alert alert-info"> Para configurar esta sección por favor pongase en contacto con el Administrador de la base da datos del sistema</div>
            <h3>Roles y Permisos</h3>
            <!--<a href="#" class="btn btn-primary">+ Nuevo Rol</a><br><br>-->
            <?php  if (count($rol) > 0): ?>
            <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Rol</th>
      <th scope="col">Descripción</th>

      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rol as $item): ?>
    <tr>
     
      <td><?php echo $item[1] ?></td>
      <td><?php echo $item[2] ?></td>

    <?php 
    endforeach;
    ?>


   </tr>
  </tbody>
</table>
<?php else: ?>
            <p class="alert alert-warning"> No hay roles registrados, para solucionar este detalle pongase en contacto con el Administrador del sistema </p>
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