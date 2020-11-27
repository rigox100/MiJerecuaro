<?php
require_once 'admin/class/Usuario.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_POST['recovery']){

    $email = (isset($_POST['email'])) ? $_POST['email'] : null;
	$token = md5($email);   
	$verificar_email = new Usuario();
	$verificar_email->setEmail($email); 
    //Verifica si el usuario que solicita se encuentra activo en la BD
	if($verificar_email->verificar_email_registrado()){
     // Mail
	define("DEMO", false); 


	$template_file = "./template/email_templates/template_email_recovery.php";


	$email_from = "MiAcambaro <admin@miacambaro.mx>";


	$swap_var = array(
		"{SITE_ADDR}" => "https://www.miacambaro.mx",
		//"{EMAIL_LOGO}" => "",
		"{EMAIL_TITLE}" => "Solicitud de reestablecimiento de password",
		"{CUSTOM_URL}" => $token,
		//"{CUSTOM_IMG}" => "",
		//"{TO_NAME}" => $nombre
		//"{TO_EMAIL}" => "user@test.com"
	);


	$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
	$email_headers .= "MIME-Version: 1.0\r\n";
	$email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


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
        $('#MsjModalRecovery').modal({backdrop: 'static', keyboard: false}); 
         $("#MsjModalRecovery").modal("show");
        
      });
</script>

 <?php 
  
  }else{
		echo '<hr /><center> Ha ocurrido un error y no pudo enviarse el correo </center>';
  }

}else{
?>
<script>
      $(document).ready(function()
      {
        $('#MsjModalRecovery').modal({backdrop: 'static', keyboard: false}); 
         $("#MsjModalRecovery").modal("show");
        
      });
</script>

<?php
}

    }

}




    




