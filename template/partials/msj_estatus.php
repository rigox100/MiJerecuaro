<?php 
if($item[11]=="En proceso"){

     $title1 = 'Solicitud en proceso';   
    $content1 = 'La solicitud para publicar su anuncio se ha generado con éxito,
     el administrador del sitio revisará la información proporcionada y una vez validada la información 
     nos pondremos en contacto con usted a la brevedad posible.';

}elseif($item[11]=="Aceptada"){

    $title1='Solicitud Aceptada';
    $content1 = 'El anuncio de su negocio fue aceptado y en breve será publicado para que pueda visualizarlo y editar algunas opciones.';
}elseif($item[11]=="Publicada"){

    $title1='Anuncio Publicado';
    $content1 = 'El anuncio de su negocio ha sido publicado con éxito, se recomienda revise y edite algunos <strong>Ajustes</strong> <span class="alert alert-warning fa fa-edit mr-2"></span> como: 
    <ul style="margin-top:-30px;">
        <li>Cambiar imagen de portada de su negocio</li>
        <li>Incluir enlaces a sus redes sociales</li>
        <li>Incluir enlace a su negocio en google maps</li>
        <li>Horario de trabajo</li>
        <li>Descripción del negocio</li>
    </ul>
    
    Si tiene alguna duda no dude en enviarnos un mensaje en la sección de <a href="#" class="btn btn-primary fas fa-edit"> Contacto </a>';
}else{
    $title1='Solicitud Rechazada';
    $content1 ='La solicitud para publicar su anuncio no ha podido ser validada,
     revise las observaciones del administrador, 
    le recomendamos cancele la solicitud actual y genere una solicitud nueva tomando
     en cuenta las observaciones enviadas.';

}