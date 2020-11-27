<?php
session_start();

if (!isset($_POST['busqueda'])) {
	header("Location: index.php");
}


include_once 'admin/class/Anuncio.php';

require_once 'admin/class/Categoria.php';
$categoria = Categoria::getRandom();
$categorias = Categoria::recuperarTodos();

$idAnuncio = (isset($_REQUEST['idAnuncio'])) ? $_REQUEST['idAnuncio'] : null;

if ($idAnuncio) {
	$anuncioBuscado = Anuncio::buscarPorId($idAnuncio);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$search = (isset($_POST['busqueda'])) ? $_POST['busqueda'] : null;
}

$search_original = $search;
$busqueda = Anuncio::busqueda($search);
$total = count($busqueda);

$articulosPagina = 10;
$paginas = ceil($total / $articulosPagina);
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
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Author Meta -->
	<meta name="author" content="MiAcambaro">
	<!-- Meta Keyword -->
	<meta name="keywords" content="MiAcambaro, Todo lo que buscas, encuentras, negocios, Acámbaro">
	<!-- Meta Description -->
	<meta name="description" content="Entra y descubre lugares en Acámbaro de una manera rápida y sencilla. En miacambaro.mx ¡Todo lo que buscas lo encuentras y lo que no también! Esta aplicación ha sido creada con el objetivo de apoyar a los negocios, profesionistas y personas que tienen algún oficio a darse a conocer por medio de la publicación de sus productos y servicios.">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!--Icon-->
	<link rel="shortcut icon" href="images/favicon.png">
	<!-- Site Title -->
	<title>Buscar negocios | Mi Jerécuaro</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!--CSS============================================= -->
	<link rel="stylesheet" href="search/css/linearicons.css">
	<link rel="stylesheet" href="search/css/font-awesome.min.css">
	<link rel="stylesheet" href="search/css/bootstrap.css">
	<link rel="stylesheet" href="search/css/magnific-popup.css">
	<link rel="stylesheet" href="search/css/nice-select.css">
	<link rel="stylesheet" href="search/css/animate.min.css">
	<link rel="stylesheet" href="search/css/owl.carousel.css">
	<link rel="stylesheet" href="search/css/main.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body>
	<div class="loader"></div>

	<header id="header" id="home">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a class="text-white" href="index.php">MiJerécuaro</a>
				</div>

				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="index.php">Inicio</a></li>
						<li><a href="registro.php">Registra tu negocio</a></li>
						<li class="d-none d-md-block">
                        <a href="" data-toggle="modal" data-target="#ModalApp">Descarga la app</a>
                            </li>
						<li><a href="contacto.php">Contacto</a></li>
						<li><a href="aviso-privacidad.php">Aviso de privacidad</a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>

	</header><!-- #header -->

	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row search-page-top d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-12">
				<img src="images/login.png" width="170" height="170"  class= "img-fluid" alt="">
					<h1 class="text-blacki" style="font-size: calc(1em + 1vw);">

						Resultados de búsqueda
					</h1>

					<form action="search.php" method="POST" class="serach-form-area" id="formulario">
						<div class="row justify-content-center form-wrap">
							<div class="col-lg-10 form-cols">
								<input type="text" class="form-control" name="busqueda" value="<?php echo $search_original ?>">

							</div>


							<!-- 	<div class="col-lg-5 form-cols">
										<input id="cate" type="text" class="form-control" name="categorias" placeholder = "Escriba el nombre de una categoría" >
									</div> -->


							<div class="col-lg-2 form-cols">
								<button type="submit" class="btn btn-info">
									<span class="lnr lnr-magnifier"></span> Buscar
								</button>
							</div>
						</div>
						<div id="errores"></div>
					</form>


				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start post Area -->
	<section class="post-area section-gap">


		<div class="container ">
			<?php if ($total > 0) : ?>
				<?php

				if ($total == 1) {
					echo '<p class="text-black"><span class="text-orange">' .  $total . '</span> resultado encontrado para <span class="text-orange">' . $search_original . '</span></p>';
				} else {
					echo '<p class="text-black"><span class="text-orange">' .  $total . '</span> resultados encontrados para <span class="text-orange">' . $search_original . '</span></p>';
				}


				?>

				<div class="row justify-content-center d-flex">

					<div class="col-lg-8 post-list">
						<table class="table" id="table-data" style="border:none;">
							<thead>
								<tr>
									<th>Resultados</th>
								</tr>

							</thead>
							<tbody >
								<?php foreach ($busqueda as $item) : ?>
									<tr>
										<td>
											<div class="single-post d-flex flex-row">

												<div class="thumb">
													<a href="" data-toggle="modal" data-target="#modal<?php echo $item[0]; ?>"><img src="admin/modules/posts/<?php echo $item['url_imagen']; ?>" alt="" width="70" height="70" class="rounded-circle mx-auto d-block"></a>
												</div>

												<div class="marle">
												<div class="details">
													<div class="title d-flex flex-row justify-content-between">
														<div class="titles">
															<a href="" data-toggle="modal" data-target="#modal<?php echo $item[0]; ?>">
																<h4><?php echo $item['titulo']; ?></h4>
															</a>
														</div>
													</div>



													<div class="starts">
														<ul class="list-unstyled list-inline rating mb-0">
															<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
															<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
															<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
															<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
															<li class="list-inline-item"><i class="fas fa-star amber-text"></i></li>
															<li class="list-inline-item">
																<p class="text-muted">5.0 (333)</p>
															</li>
														</ul>
													</div>

													<div class="closed-ca ti-home"><?php echo $item['calle']; ?>.&nbsp;&nbsp; 
													<span class="closed-wa ">

															<?php
															$tel = $item['telefono'];
															if(!empty($tel)){
																echo "&#x260e;&nbsp;". $tel;
															}else{
																echo "";
															}
															
															
															?>
													</span> 
													&nbsp;&nbsp; <span class="closed-mun">Jerécuaro </span> 
													<span class="closed-cat">
														<?php 
															$cate = $item['nombre'];
															//echo $item['nombre'];
															
															if($cate == "Sin clasificación"){
																echo " ";
															}else{
																echo " - " .$cate;		
															}
															
														
															
														?>
													</span> 
												   </div>




													<div class="closed-now">ABIERTO AHORA</div>


													</div>



												</div>

											</div>

											<!-- Modal -->

											<div class="modal fade" id="modal<?php echo $item[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">





												<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="text-center modal-title" id="exampleModalCenterTitle" style="font-size: calc(0.5em + 1vw);"><?php echo $item['titulo']; ?></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-body">

															<nav>
																<div class="nav nav-tabs" id="nav-tab" role="tablist">
																	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home<?php echo $item[0]; ?>" role="tab" aria-controls="nav-home" aria-selected="true">Información</a>
																	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile<?php echo $item[0]; ?>" role="tab" aria-controls="nav-profile" aria-selected="false">Encuentranos</a>
																	<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact<?php echo $item[0]; ?>" role="tab" aria-controls="nav-contact" aria-selected="false">Opiniones</a>
																</div>
															</nav>
															<div class="tab-content" id="nav-tabContent">
																<div class="tab-pane fade show active" id="nav-home<?php echo $item[0]; ?>" role="tabpanel" aria-labelledby="nav-home-tab">
																	<br>
																	<div>
																		<img src="admin/modules/posts/<?php echo $item['url_imagen']; ?>" alt="" class="img-fluid d-block m-auto" style="width: 85%; height:300px;">
																	</div>
																	<div>
																		<br>
																		<h4>General</h4>
																		<hr>
																		<div class="starts">
																			<ul class="list-unstyled list-inline rating mb-0">
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item">
																					<p class="text-muted">5.0 (333)</p>
																				</li>
																			</ul>
																		</div>

																		<div class="">
																			<h6 class="fa fa-map-marker">&nbsp;<span class="model"><?php echo $item['calle']; ?>&nbsp;<?php echo $item['cp']; ?> &nbsp;<?php echo $item['municipio']; ?> - Guanajuato </span></h6>
																		</div>
																		
																		<div class="">
																			<h6>&#x260e;</h6>
																		</div>

																		<br>
																		<h4>Horario</h4>
																		<hr>

																		<div class="closed-now2">ABIERTO AHORA</div><br>
																		<h6 class="fa fa-clock-o">&nbsp;<span class="model">&nbsp;8:00 AM - 11:00 PM </span></h6>


																		<br><br>
																		<h4>Información de Contacto</h4>
																		<hr>

																	<!-- 	<a href="#">
																			<h6 class="fa fa-whatsapp">&nbsp;<span class="model">&nbsp;</span></h6>
																		</a><br>
																		<a href="#">
																			<h6 class="fa fa-envelope">&nbsp;<span class="model">&nbsp;minegocio@miacambaro.mx</span></h6>
																		</a><br>
																		<a href="#">
																			<h6 class="fa fa-facebook-square">&nbsp;<span class="model">&nbsp;www.facebook.com/minegocio</span></h6>
																		</a><br>
																		<a href="#">
																			<h6 class="fa fa-instagram">&nbsp;<span class="model">&nbsp;https://www.instagram.com/minegocio</span>
																		</a></h6> -->

																		<div class="text-center">
																			<a href="#"><img src="images/face.png" width="40px" height="40px"></a>
																			<a href="#"><img src="images/what.png" width="40px" height="40px"></a>
																			<a href="#"><img src="images/insta.png" width="40px" height="40px"></a>
																			<a href="#"><img src="images/youtu.png" width="40px" height="40px"></a>
																		</div>




																	</div>
																</div>


																<div class="tab-pane fade" id="nav-profile<?php echo $item[0]; ?>" role="tabpanel" aria-labelledby="nav-profile-tab">
																	<br>
																	<?php if ($item['google_maps'] != "") {
																	?>
																		<iframe src="<?php echo $item['google_maps'] ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
																	<?php
																	} else {
																		echo '<p><small class="alert alert-info">Aún no se ha registrado una ubicación en Google Maps para este negocio</small></p>';
																	}
																	?>

																</div>

																<div class="tab-pane fade" id="nav-contact<?php echo $item[0]; ?>" role="tabpanel" aria-labelledby="nav-contact-tab">
																	<div class="single-post d-flex flex-row">

																		<div class="thumb">
																			<img src="admin/modules/posts/<?php echo $item['url_imagen']; ?>" alt="" width="70" height="70" class="rounded-circle">
																		</div>

																		<div class="details">
																			<div class="title d-flex flex-row justify-content-between">
																				<div class="titles">
																					<br>
																					<h4>José Hernández</h4>

																				</div>
																			</div>

																			<div class="closed-ca"> Excelente lugar, muy recomendado.</div>

																		</div>



																	</div>

																</div>
															</div>
														</div>


														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

														</div>
													</div>
												</div>
											</div>


										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>


					<?php else : ?>

						<div class="container">
							<div class="row justify-content-center d-flex">
								<div class="col-lg-8 post-list">
									<div class="single-post d-flex flex-row">
										<div class="thumb">
											<img src="search/img/post.png" alt="" width="150" height="80" class="img-fluid">
											<ul class="tags">

											</ul>
										</div>
										<div class="details">
											<div class="title d-flex flex-row justify-content-between">
												<div class="titles">
													<a href="single.html">
														<h4>Ups!! No hemos encontrado resultados para "<?php echo $search_original ?>" </h4>
													</a>

												</div>
												<ul class="btns">
													<!-- <li><a href="#"><span class="lnr lnr-heart"></span></a></li> -->

												</ul>
											</div>



										</div>
									</div>
								<?php endif; ?>

								</div>






								<div class="col-lg-4 sidebar">



									<div class="single-slidebar">

										<h4 class="text-center">Lugares Destacados</h4>

										<?php
										include_once 'admin/class/Anuncio.php';
										$anuncio = Anuncio::getRandom();

										if (count($anuncio) > 0) :
										?>

											<div class="active-relatedjob-carusel">
												<?php foreach ($anuncio as $item) : ?>

													<div class="single-rated">
														<a href="#">
															<img src="./admin/modules/posts/<?php echo $item['url_imagen']; ?>" class="img-fluid" alt="#">
															<h4><?php echo $item['titulo']; ?></h4>
														</a>

														<div class="starts">
															<ul class="list-unstyled list-inline rating mb-0">
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item">
																	<p class="text-muted">5.0 (333)</p>
																</li>
															</ul>
														</div>
														<h6><span class="closed-mun">Jerécuaro </span> - <span class="closed-cat"><?php echo $item['nombre']; ?></span></h6>
														<p>
															<?php echo $item[11]; ?>
														</p>
														<hr>
														<h4>Información</h4>
														<div>
															<h5 class="direc"> &#x1f3e0;&#xfe0e; &nbsp;<?php echo $item['calle']; ?></h5>
														</div>

														<div>
															<h5 class="direc"> &#x260e; &nbsp;<?php echo $item['telefono']; ?></h5>
														</div>

														<div>
															<h5 class="direc">&#x23f0;&#xfe0e;&nbsp;<?php echo $item['entrada']; ?> - <?php echo $item['cierre']; ?></h5>
														</div>

														<hr>

														<br><br><br><br>
														<div class="justify-content-center">
															<a href="#" class="btns text-uppercase">Ver más...</a>
														</div>
													</div>




												<?php endforeach; ?>




											</div>
										<?php else : ?>
											<p class="alert alert-info"> No hay lugares destacados agregados </p>
										<?php endif; ?>
									</div>

									<div class="single-slidebar">
										<h4 class="text-center">Categorías</h4>
										<ul class="cat-list">
											<?php foreach ($categoria as $item) : ?>
												<li><a class="justify-content-between d-flex" href="#">
														<p><?php echo $item[1]; ?></p>
													</a></li>
											<?php
											endforeach;
											?>
										</ul>
									</div>



								</div>
							</div>
							<?php
							include_once 'template/partials/msj_modal_descarga_app.php';
							?>
						</div>
	</section>
	<!-- End post Area -->



	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">


			<div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> Todos los derechos reservados | miJerecuaro.mx
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
				<div class="col-lg-4 col-sm-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>

					<a href="#"><i class="fa fa-whatsapp"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>

				</div>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	< <script src="search/js/vendor/jquery-2.2.4.min.js">
		</script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js" integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>





		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


		<script src="search/js/vendor/bootstrap.min.js"></script>
		<script src="search/js/easing.min.js"></script>
		<script src="search/js/hoverIntent.js"></script>
		<script src="search/js/superfish.min.js"></script>
		<script src="search/js/jquery.ajaxchimp.min.js"></script>
		<script src="search/js/jquery.magnific-popup.min.js"></script>
		<script src="search/js/owl.carousel.min.js"></script>
		<script src="search/js/jquery.sticky.js"></script>
		<script src="search/js/jquery.nice-select.min.js"></script>
		<script src="search/js/parallax.min.js"></script>
		<script src="search/js/mail-script.js"></script>
		<script src="search/js/main.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<script src="js/data.js"></script>

		<script type="text/javascript">
			$(window).load(function() {
				$(".loader").fadeOut("slow");
			});
		</script>


		<script>
			$(document).ready(function() {
				$.validator.addMethod("formAlphanumeric", function(value, element) {
					var pattern1 = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
					return this.optional(element) || pattern1.test(value);
				}, "El campo debe tener un valor alfanumérico");


				$("#formulario").validate({

					rules: {

						busqueda: {
							required: true,
							formAlphanumeric: true,
							maxlength: 30,

						}

					},

					messages: {

						busqueda: {
							required: "Por favor introduzca una palabra",
							formAlphanumeric: "La busqueda solo puede contener letras",
							maxlength: "Solo se admite un máximo de 30 caracteres"

						},

					},

					errorLabelContainer: "#errores"


				});

			});
		</script>

</body>

</html>