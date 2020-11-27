<?php
include_once '../../assets/template/header.php';
include_once '../../class/Anuncio.php';

$anuncio = Anuncio::recuperarTodos2();
require_once '../../class/Categoria.php';
$categoria = Categoria::recuperarTodos();


?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h3 class="text-center">Publicación de anuncios</h3>
            <?php  if ($categoria != null) : ?>
              <a href="save.php" class="btn btn-primary" >+ Nuevo Anuncio</a><br><br>
            
            <?php else: ?>
              <!-- <a href="save.php" class="btn btn-primary" readonly>+ Nuevo Anuncio</a><br><br> -->
              <p class="alert alert-info"> Por favor registre las clasificaciones de los anuncios </p>
            <?php endif; ?>




            <?php  if (count($anuncio) > 0): ?>
            <table class="table table-bordered" id="table-data">
  <thead class="thead-dark">
    <tr>
     
      <th scope="col">Empresa</th>
      
      
      <th scope="col">Estatus</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($anuncio as $item): ?>
    <tr>
      
      <td><?php  echo $item['titulo']; ?></td>
      
 
     
      <td class="text-center">
        <?php 
        if($item['estatus_anuncio']=='Publicado'){
            echo '<i class="alert alert-success fas fa-flag" title="Anuncio publicado"></i>';
        }elseif ($item['estatus_anuncio']=='Borrador'){
          echo '<i class="alert alert-warning fas fa-flag" title="En espera"></i>';
        }else{
          echo '<i class="alert alert-danger fas fa-flag" title="Anuncio Inactivo"></i>';
        } ?>
      </td>
      <td class="text-center"><a href="show.php?idAnuncio=<?php echo $item[0];?>" class="btn btn-info far fa-edit" target="_blank"></a></td>
      <td class="text-center"><a href="save.php?idAnuncio=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
      <td class="text-center"><a href="delete.php?idAnuncio=<?php echo $item[0];?>&idSolicitud=<?php echo $item[24];?>" onclick="return confirm('¿Está seguro que desea eliminar este anuncio?')" class="btn btn-danger far fa-trash-alt"></a></td> 

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php else: ?>
            <p class="alert alert-info"> No hay anuncios agregados </p>
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