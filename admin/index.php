<?php session_start(); 
if($_SESSION['idRol']== null || $_SESSION['idRol']!=1){
  header('Location: ../login.php');
}
require_once 'class/Solicitud.php';
$solicitudes_recientes = Solicitud::buscarRecientes();
//var_dump($solicitudes_recientes);
$num_solcitudes = Solicitud::obtenerTotalSolicitudes();
$total = array_values($num_solcitudes)[0];
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Author Meta -->
	<meta name="author" content="MiAcambaro">
	 <!-- Meta Keyword -->
	 <meta name="keywords" content="MiAcambaro, Todo lo que buscas, encuentras, negocios, Acámbaro">
    <!-- Meta Description -->
    <meta name="description" content="Entra y descubre lugares en Acámbaro, aquí todo lo que buscas lo encuentras y lo que no tambien, animate y anuncia tu negocio.
     miacambaro.mx es un proyecto creado con el objetivo de apoyar a reactivar la economía de la región de Acámabro, Guanajuato por medio de la publicación y publicidad de los negocios, profesionistas y oficios con el fin de darlos a conocer">
  <!--Icon-->
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>CPANEL</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link" target="_blank">Ver sitio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://analytics.google.com/analytics/web" target="_blank" class="nav-link">Analytics</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://webmail.hostinger.mx" target="_blank" class="nav-link">Webmail</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://auth-db270.hostinger.mx/" target="_blank" class="nav-link">PHPMyAdmin</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo $_SESSION['nombre'];?>
     </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="../logout.php">Cerrar Sesión</a>
        </div>
      </li>
      <!-- Messages Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-primary navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
             Message Start 
            <div class="media">
              <img src="assets/img/avatar.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Chris Lozano
                </h3>
                <p class="text-sm">Texto del mensaje</p>
              </div>
            </div> 
          </a>
                
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
             Message Start 
            <div class="media">
              <img src="assets/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Rigo Rivera
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Mensaje 2</p>
               
              </div>
            </div>
            Message End
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todos los mensajes</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php if($total>0){?>
          <span class="badge badge-danger navbar-badge"><?php echo $total;?></span>
          <?php } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header"><?php echo $total.' solicitudes pendientes';?></span>
          <?php foreach($solicitudes_recientes as $item ):?>
          <div class="dropdown-divider"></div>
          <a href="modules/ad_request/save.php?idSolicitud=<?php echo $item[0];?>" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> <?php echo $item[1]; ?>
            <span class="float-right text-muted text-sm"><?php echo $item[2]; ?></span>
          </a>
          <?php endforeach;?>
          <div class="dropdown-divider"></div>
          <a href="modules/ad_request/index.php" class="dropdown-item dropdown-footer">Ver todas las solicitudes</a>
        </div>
      </li>  
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="assets/img/gears.png" alt="Mi Acámbaro" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CPANEL</span><br>
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php  if($_SESSION['idRol']==1){ echo 'Administrador'; }else{ echo 'Colaborador';}?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Módulos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="modules/users/index.php" class="nav-link">
                <i class="fas fa-users"></i>
                  <p>Colaboradores registrados</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="modules/roles/index.php" class="nav-link">
                  <i class="fa fa-user-circle"></i>
                  <p>Roles de usuarios</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="modules/posts_categories/index.php" class="nav-link">
                  <i class="fa fa-cog"></i>
                  <p>Clasificaciones de anuncios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modules/posts/index.php" class="nav-link">
                  <i class="fa fa-flag"></i>
                  <p>Publicación de anuncios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modules/ad_request/index.php" class="nav-link">
                  <i class="fas fa-file"></i>
                  <p>Solicitudes de anuncio</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Inicio</h1>
            <button class="btn btn-primary">+ Nueva nota </button>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CPANEL</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Nota 1</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Título de la nota</h6>

                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam tempora voluptatem 
                  consequatur mollitia, adipisci laboriosa.</p>
                  <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Nota 2</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Título de la nota</h6>

                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam tempora voluptatem 
                  consequatur mollitia, adipisci laboriosa.</p>
                  <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Nota 3</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Título de la nota</h6>

                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam tempora voluptatem 
                  consequatur mollitia, adipisci laboriosa.</p>
                  <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Nota 4</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Título de la nota</h6>

                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam tempora voluptatem 
                  consequatur mollitia, adipisci laboriosa.</p>
                  <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <p>Copyright &copy; <?php echo date('Y') ?>. Todos los derechos reservados | miacambaro.mx</p>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
</body>
</html>
