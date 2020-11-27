<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es-MX">

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
    <meta name="description" content="Registra tu negocio de una manera rápida y sencilla y llega a más personas. En miacambaro.mx">
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
    <script src="https://www.google.com/recaptcha/api.js?render=6LeRAtsZAAAAAFPj_jVnUreuGCaI8Z09QCG3kz9d"></script>
    <title>Registra tu negocio | Mi Acámbaro</title>
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
                    <div class="col-md-12" style="background-color: #ff4a00">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php" style="color:white;">
                                MiAcámbaro

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
                                    <li class="nav-item d-none d-md-block">
                                        <a class="nav-link" href="" data-toggle="modal" data-target="#ModalApp" style="color:white;">Descarga la app</a>
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
            <div class="row">
                <div class="col">
                    <div class="jumbotron">
                        <h4 class="display-4" style="font-size: calc(1em + 1vw);">Si tienes un negocio, eres un profesionista o te dedicas a algún oficio y quieres anunciarte para llegar a más personas.</h4>
                        <p class="lead font-weight-bold"> Es muy sencillo, solo sigue los siguientes pasos:</p>
                        <p class="lead"> 1.- Registra los datos en el formulario de solicitud.</p>
                        <p class="lead"> 2.- Espera a que el administrador revise tus datos.</p>
                        <p class="lead"> 3.- Una vez verificados tus datos el administrador se pondrá en contacto contigo.</p>
                        <p class="lead"> 4.- ¡Listo! Tu negocio será publicado en miacambaro.mx</p>
                        <hr>
                        <p class="lead font-weight-bold text-primary"> <small>*Todas las solicitudes del municipio de Acámbaro y sus alrededores pueden postularse. </small></p>

                        <button type="button" class="btn btn-primary btn-lg w-100" data-toggle="modal" data-target="#exampleModal">
                            <span style="font-size: calc(0.5em + 1vw);">¡Registrar mi negocio!</span>
                        </button>
                    </div>
                </div>
            </div>
            <?php
            require_once "lib/recaptcha.php";
            include_once "lib/validar_registro.php";
            ?>

            <div class="row justify-content-center">
                <div style="height:35px;" class="col-12 d-md-none d-lg-none"></div>

                <div class="col-md-10">

                    <div class="card" style="border: none;">

                        <div class="card-body">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel" class="text-center" style="font-size: calc(1.2em + 1vw);">Registra tu negocio</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="registro.php" method="post" id="form">

                                                <div style="padding: 20px;">

                                                    <input class="form-control" type="hidden" name="rfc" id="rfc" placeholder="Ingresa el RFC de tu negocio" value="">

                                                    <div class="form-group row">
                                                        <label for="nombre_negocio">Nombre del Negocio</label>
                                                        <input class="form-control" type="text" name="nombre_negocio" id="nombre_negocio" value="">
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="tel">Teléfono de contacto</label>
                                                        <input class="form-control" type="text" name="tel" id="tel" value="">
                                                    </div>



                                                    <div class="form-group row">
                                                        <label for="calle">Dirección</label>
                                                        <input class="form-control" type="text" name="calle" id="calle" placeholder="Ingrese calle y número del negocio" value="">

                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="colonia">Colonia</label>
                                                        <input class="form-control" type="text" name="colonia" id="colonia" value="">
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="cp">Código Postal</label>
                                                        <input class="form-control" type="text" name="cp" id="cp" value="">
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="municipio">Localidad/Municipio</label>
                                                        <input type="text" name="municipio" id="municipio" class="form-control" value="Acámbaro" readonly>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="tel">Estado</label>
                                                        <input class="form-control" type="text" name="estado" id="estado" value="Guanajuato" readonly>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="descripcion">Cuentanos un poco de tu negocio</label>
                                                        <textarea name="descripcion" id="descripcion" rows="4" class="form-control" placeholder="Describe el giro tiene tu negocio, los servicios o productos ofreces..."></textarea>
                                                    </div>


                                                    <div class="form-group row">

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="politica_privacidad" required> He leído el <a href="aviso-privacidad.php" target="_blank"> aviso de privacidad</a>
                                                            </label>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 offset-md-4">

                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-lg btn-success w-100">
                                                            Registrar ahora
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script src="template/js/registro_validate.js"></script>
                            <script>
                                $('#form').submit(function(event) {


                                    if ($("#form").valid()) {
                                        event.preventDefault();
                                        grecaptcha.ready(function() {
                                            grecaptcha.execute('6LeRAtsZAAAAAFPj_jVnUreuGCaI8Z09QCG3kz9d', {
                                                action: 'registro'
                                            }).then(function(token) {
                                                $('#form').prepend('<input type="hidden" name="token" value="' + token + '">');
                                                $('#form').prepend('<input type="hidden" name="action" value="registro">');
                                                $('#form').unbind('submit').submit();
                                            });;
                                        });
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include_once 'template/partials/msj_modal_registro_solicitud.php';

            include_once 'template/partials/msj_modal_descarga_app.php';

            ?>


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