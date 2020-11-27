<?php
include_once '../../assets/template/header.php';
include_once '../../class/Categoria.php';
$categoria = Categoria::recuperarTodos();
?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h3 class = "text-center">Clasificaciones de anuncios</h3>
            <a href="save.php" class="btn btn-primary">+ Nueva Clasificación</a><br><br>
            <?php  if (count($categoria) > 0): ?>
            <table class="table table-bordered" id="table-data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Título de la clasificación</th>
      <th scope="col">Descripción</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($categoria as $item): ?>
    <tr>
      <th scope="row"><?php echo $item['nombre']; ?></th>
      <td><?php echo $item['descripcion']; ?></td>
      <td class="text-center"><a href="save.php?idCategoria=<?php echo $item[0];?>&edit=true" class="btn btn-warning far fa-edit"></a></td>
      <td class="text-center"><a href="delete.php?idCategoria=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar esta clasificación?')" class="btn btn-danger far fa-trash-alt"></a></td> 

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
            <p class="alert alert-info"> No hay clasificaciones registradas </p>
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