<?php
session_start();
if (isset($_SESSION['idRol'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NSY7H1BK2G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NSY7H1BK2G');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author Meta -->
    <meta name="author" content="MiAcambaro">
    <!-- Meta Keyword -->
    <meta name="keywords" content="MiAcambaro, Todo lo que buscas, encuentras, negocios, Acámbaro">
    <!-- Meta Description -->
    <meta name="description" content="Entra y descubre lugares en Acámbaro de una manera rápida y sencilla.
    En miacambaro.mx ¡Todo lo que buscas lo encuentras y lo que no también! Esta aplicación ha sido creada con el objetivo de apoyar a los negocios, profesionistas y personas que tienen algún oficio a darse a conocer por medio de la publicación de sus productos y servicios.">
    <!-- Icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/registrer_form.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <title>Login | Mi Acámbaro</title>

    <style>
        input {
            font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: inherit;

        }
    </style>
</head>

<body>

    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed" style="border:none;">
                <div class="row">
                    <div class="col-md-12" style="background-color: #ff4a00;">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php" style="color:white;">
                                MiAcámbaro
                                <!-- <img src="images/logo.png" width="120" height="42" class="d-inline-block align-top" alt=""> -->
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" style="color:white;" href="index.php">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color:white;" href="registro.php">Registra tu negocio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contacto.php" style="color:white;">Contacto</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="aviso-privacidad.php" style="color:white;">Aviso de privacidad</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="login-form" style="margin-top: 7%; margin-bottom:1%;">
        <div class="container">
            <div class="row justify-content-center">
                <div style="height:35px;" class="col-12 d-md-none d-lg-none"></div>
                <div class="col-12 display-4 mb-3 mt-2 text-center" style="font-size: calc(1.2em + 1vw);">Login</div>
                <div class="col-md-10">
                    <?php
                    if (isset($_GET['message'])) {
                        if ($_GET['message'] == 'error') {
                            echo '<div class="alert alert-danger"> Error al intentar iniciar sesión, verifica que tu correo o contraseña sean correctos</div>';
                        }
                    }
                    ?>

                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <form action="lib/validar_login.php" method="post" id="form">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email" class="form-control" name="email" placeholder="&#xf0e0" onfocus="this.placeholder = ''" onblur="this.placeholder = '&#xf0e0'" value="" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xf023" onfocus="this.placeholder = ''" onblur="this.placeholder = '&#xf023'" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark w-100">
                                        Acceder
                                    </button>


                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright &copy; <?php echo date('Y') ?>. Todos los derechos reservados | miacambaro.mx</p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <ul>
                            <li><a href="#"><span class="ti-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-whatsapp" style="font-size:28px"></span></a></li>
                            <li><a href="#"><span class="ti-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--//END FOOTER -->
</body>

</html>