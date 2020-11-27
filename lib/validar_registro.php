<?php
require_once 'admin/class/Solicitud.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Ingresa tu clave secreta.....
  define("RECAPTCHA_V3_SECRET_KEY", '6LeRAtsZAAAAAG1bRIpJ-6fRrFNlIZLjlCCQn_lT');
  
  $token = $_POST['token'];
  $action = $_POST['action'];
   
  // call curl to POST request
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  $arrResponse = json_decode($response, true);
   
  // verificar la respuesta
  if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
     
    
    $email= 'ventas@miacambaro.mx';
    $nombre_negocio = (isset($_POST['nombre_negocio'])) ? $_POST['nombre_negocio'] : null;
    $url_imagen = 'uploads/images/mi_negocio.jpg';
    $rfc = (isset($_POST['rfc'])) ? $_POST['rfc'] : null;
    $tel = (isset($_POST['tel'])) ? $_POST['tel'] : null;
    $calle = (isset($_POST['calle'])) ? $_POST['calle'] : null;
    $colonia = (isset($_POST['colonia'])) ? $_POST['colonia'] : null;
    $cp = (isset($_POST['cp'])) ? $_POST['cp'] : null;
    $municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : null;
    $fecha_solicitud = date('Y-m-d');
    $estatus_solicitud = "En Proceso";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;

    $solicitud = new Solicitud();
    $solicitud->setNombreNegocio($nombre_negocio);
    $solicitud->setUrlImagen($url_imagen);
    $solicitud->setRFC($rfc);
    $solicitud->setTel($tel);
    $solicitud->setCalle($calle);
    $solicitud->setColonia($colonia);
    $solicitud->setCP($cp);
    $solicitud->setMunicipio($municipio);
    $solicitud->setFechaSolicitud($fecha_solicitud);
    $solicitud->setEstatusSolicitud($estatus_solicitud);
    $solicitud->setDescripcion($descripcion);
  if ($solicitud->guardar()) {

    // Mail
	define("DEMO", false); 


	$template_file = "./template/email_templates/template_solicitud.php";


	$email_from = "Solicitud de registro <user@miacambaro.mx>";


	$swap_var = array(
		"{SITE_ADDR}" => "https://www.miacambaro.mx",
		"{EMAIL_TITLE}" => "Ha recibido una solicitud de ".$nombre_negocio,
		"{NOMBRE_NEGOCIO}" => $nombre_negocio,
    "{TEL}" => $tel,
    "{CALLE}" => $calle,
    "{COLONIA}" => $colonia,
    "{CP}" => $cp,
    "{FECHA}" => date('d-m-Y'),
    "{DESCRIPCION}" => $descripcion
		//"{TO_EMAIL}" => "user@test.com"
	);


	$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
	$email_headers .= "MIME-Version: 1.0\r\n";
	$email_headers .= "Content-Type: text/html; charset=UTF-8 \r\n";


	$email_to = $email;
	$email_subject = $swap_var['{EMAIL_TITLE}']; 


	if (file_exists($template_file))
		$email_message = file_get_contents($template_file);
	else
		die ("Error al cargar el template");

	
	foreach (array_keys($swap_var) as $key){
		if (strlen($key) > 2 && trim($swap_var[$key]) != '')
			$email_message = str_replace($key, $swap_var[$key], $email_message);
	}

	if (DEMO)
		die("<hr /><center>Esto solo es una prueba </center>");


	if (mail($email_to, $email_subject, $email_message, $email_headers) ){ 
      
    ?>
<script>
     $(document).ready(function()
      {
        $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false}); 
         $("#exampleModalCenter").modal("show");
        
      }); 
</script>

 <?php 
  
  }else{
		echo '<hr /><center> Ha ocurrido un error y no pudo enviarse el correo </center>';
  }
  
  } else {

    echo '<p class="aler alert-warning">Ocurrió un error al procesar el registro, por favor vuelva a intentarlo</p>';
  }

  } else {
      // Si entra aqui, es un robot....
    echo "Ha ocurrido un error, por favor vuelva a intentarlo";
  }


}
