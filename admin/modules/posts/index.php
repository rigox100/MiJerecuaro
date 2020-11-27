<?php
include_once '../../assets/template/header.php';
include_once '../../class/Anuncio.php';

if(isset($_POST['search1'])){
$anuncio = Anuncio::recuperarPorCorte($_POST['rango1'], $_POST['rango2']);
}elseif(isset($_POST['search2'])){
$anuncio = Anuncio::recuperarPorID($_POST['id_search']);
}elseif(isset($_POST['search3'])){
$anuncio = Anuncio::busqueda($_POST['search']);
}else{
$anuncio = Anuncio::recuperarTodos();
}

$total = Anuncio::recuperarTotal();
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
              <div class="row">
                <div class="col-12">
                  <h4>Opciones de búsqueda </h4>
                <p>Realiza una búsqueda de un total de <strong class="text-primary"> <?php echo $total ?> registros </strong></p>
                </div>
              <div class="col-xs-12 col-md-5 frm-search">  
              <p><strong>Buscar registros por cortes</strong> </p>
              <form action="" method="post">
                <input type="hidden" name="search1" value="1">
                <div class="form-group">
                  <label for="cortes">Obtener registros del ID </label>
                  <input type="number" name="rango1"  value="<?php if(isset($_POST['rango1'])){echo $_POST['rango1'];}else{echo "1";}?>" min="1"  max="<?php echo $total ?>">
                  <label for="cortes">al </label>
                  <input type="number" name="rango2" value="<?php if(isset($_POST['rango2'])){echo $_POST['rango2'];}else{echo "50";}?>" min="1"  max="<?php echo $total ?>">
                </div>
               <div class="form-group">
                 <button class="btn btn-dark w-100">Buscar registros</button>
               </div>

              </form>
              </div>

              <div class="col-xs-12 col-md-3 frm-search">
              <p><strong>Buscar por ID</strong> </p>
              <form action="" method="post">
                <input type="hidden" name="search2" value="2">
                <div class="form-group">
                  <label for="cortes">ID a buscar </label>
                  <input type="text" name="id_search" class="w-100" value="<?php if(isset($_POST['id_search'])){echo $_POST['id_search'];}?>" required>
                </div>
               <div class="form-group">
                 <button class="btn btn-dark w-100">Buscar ID del registro</button>
               </div>

              </form>
              </div>

              <div class="col-xs-12 col-md-3 frm-search">
              <p><strong>Buscar por nombre</strong> </p>
              <form action="" method="post">
                <input type="hidden" name="search3" value="2">
                <div class="form-group">
                  <label for="cortes">Nombre a buscar </label>
                  <input type="text" name="search" class="w-100" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}?>" required>
                </div>
               <div class="form-group">
                 <button class="btn btn-dark w-100">Buscar registro</button>
               </div>

              </form>
              </div>


              </div> 

              <hr>

            <table class="table table-bordered" id="table-data">
  <thead class="thead-dark">
    <tr>
    <th scope="col">ID</th>  
    <th scope="col">Portada</th>
      <th scope="col">Empresa</th>
      <th scope="col">Clasificación</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Fecha de Publicación</th>
      <th scope="col">Estatus</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($anuncio as $item): ?>
    <tr>
    <td><?php echo $item['idAnuncio']; ?></td>
      <td style="width:25%"><img src="<?php echo $item['url_imagen']; ?>" width="150" height="150" class="img-fluid"></td>
      <td><?php if($item['idSolicitud']!=NULL){?><span class="far fa-user"></span> <?php } echo $item['titulo']; ?></td>
      <td><?php echo $item['nombre']; ?></td>
      <td><?php echo $item['telefono']; ?></td>
      <td><?php echo $item[28]; ?></td>
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