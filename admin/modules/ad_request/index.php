<?php
include_once('../../assets/template/header.php');
require_once('../../class/Solicitud.php');
$solicitudes = Solicitud::recuperarTodos();
?>
<!-- Main content -->
<div class="content" id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php
        if (isset($_GET['message'])) {
          if ($_GET['message'] == "success") {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <small>La solicitud de <?php echo $_GET['negocio'] ?> se ha publicado exitosamente </small>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php
          }
        }
        ?>
        <h3>Solicitudes de anuncios</h3> <br>
        <?php if (count($solicitudes) > 0) : ?>
          <table class="table table-bordered" id="table-data">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Folio</th>
                <th scope="col">Fecha </th>
                <th scope="col">Negocio</th>
                <th scope="col">Estatus</th>
                <th scope="col">Revisar</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Publicar</th>


              </tr>
            </thead>
            <tbody>
              <?php foreach ($solicitudes as $item) : ?>
                <tr>

                  <td><?php echo $item[0] ?></td>
                  <td><?php echo $item[14] ?></td>
                  <td><?php echo $item['nombre_negocio'] ?></td>

                  <td>
                    <?php
                    if ($item[10] == 'En proceso') {
                      echo '<small class="alert alert-secondary text-center">' . $item[10] . '</small>';
                    } elseif ($item[10] == 'Aceptada') {
                      echo '<small class="alert alert-primary text-center">' . $item[10] . '</small>';
                    } elseif ($item[10] == 'Publicada') {
                      echo '<small class="alert alert-success text-center">' . $item[10] . '</small>';
                    } else {
                      echo '<small class="alert alert-danger text-center">' . $item[10] . '</small>';
                    }

                    ?>
                  </td>
                  <td class="text-center"><a href="save.php?idSolicitud=<?php echo $item[0]; ?>" class="btn btn-info fa fa-eye"></a></td>
                  <td class="text-center"><a href="delete.php?idSolicitud=<?php echo $item[0]; ?>" onclick="return confirm('¿Está seguro que desea eliminar esta solicitud?')" class="btn btn-danger far fa-trash-alt"></a></td>

                  <?php
                  if ($item[10] == 'Aceptada') {
                    echo '<td class="text-center"><a href="publicar.php?idSolicitud=' . $item[0] . '" class="btn btn-primary fas fa-file mr-2" title="Clic para publicar esta solicitud"></a></td>';
                  } elseif ($item[10] == 'Publicada') {
                    echo '<td class="text-center"><a href="#" class="btn btn-success fas fa fa-check-circle mr-2 btn2"></a></td>';
                  } else {
                    echo '<td class="text-center"><strong>---</strong></td>';
                  }
                  ?>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table> <br>
        <?php else : ?>
          <p class="alert alert-info"> No hay solicitudes registradas </p>
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