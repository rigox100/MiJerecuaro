<?php
include_once '../../assets/template/header.php';
?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <a href="index.php" class="btn btn-info">Regresar</a><br>

          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
            <h4 class="text-center">Registrar Rol</h4> <br>
            <form action="save.php" method="post">

            <div class="form-group">
            <input class="form-control" type="text" name="idPrivilegio" id="idPrivilegio" value="">
            </div>

            <div class="form-group">
            <label for="nombre">Nombre del Rol</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="">
            </div>
            <div class="form-group">
            <label for="descripcion">Descripción</label>
           <textarea class="form-control" name="descripcion" id="descripcion" rows="5" ></textarea>
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