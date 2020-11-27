<?php

require_once 'Conexion.php';

class Anuncio {

    private $idAnuncio;
    private $idCategoria;
    private $titulo;
    private $url_imagen;
    private $municipio;
    private $estado;
    private $calle;
    private $colonia;
    private $cp;
    private $telefono;
    private $facebook;
    private $instagram;
    private $youtube;
    private $sitio;
    private $google_maps;
    private $descripcion;
    private $primer_dia_sem;
    private $ultimo_dia_sem;
    private $entrada;
    private $cierre;
    private $estatus_anuncio;
    private $keywords;
    private $fecha_publicacion;
    private $idSolicitud;
    private $destacado;
    
    

    const TABLA = 'anuncios';
    
  
    
    public function __construct( $titulo=null, $url_imagen=null, $municipio=null, $estado=null, $calle=null, $colonia=null, $cp=null, $telefono=null, $facebook=null, $instagram=null, $youtube=null,
     $sitio=null, $google_maps=null, $descripcion=null, $primer_dia_sem=null, $ultimo_dia_sem=null, $entrada=null, $cierre = null, $estatus_anuncio=null, $keywords=null, $fecha_publicacion=null, $destacado=null, $idAnuncio=null, $idCategoria=null, $idSolicitud=null) {
       
        
        $this->titulo = $titulo;
        $this->url_imagen = $url_imagen;
        $this->municipio = $municipio;
        $this->estado = $estado;
        $this->calle = $calle;
        $this->colonia = $colonia;
        $this->cp = $cp;
        $this->telefono = $telefono;
        $this->facebook = $facebook;
        $this->instagram = $instagram;
        $this->youtube = $youtube;
        $this->sitio = $sitio;
        $this->google_maps = $google_maps;
        $this->descripcion = $descripcion;
        $this->primer_dia_sem = $primer_dia_sem;
        $this->ultimo_dia_sem = $ultimo_dia_sem;
        $this->entrada = $entrada;
        $this->cierre = $cierre;
        $this->estatus_anuncio = $estatus_anuncio;
        $this->keywords = $keywords;
        $this->fecha_publicacion = $fecha_publicacion;
        $this->destacado = $destacado;
        $this->idAnuncio = $idAnuncio;
        $this->idCategoria = $idCategoria;
        $this->idSolicitud = $idSolicitud;
        

    }
    
    public function getIdAnuncio() {
        return $this->idAnuncio;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getUrlImagen() {
        return $this->url_imagen;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getColonia() {
        return $this->colonia;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function getInstagram() {
        return $this->instagram;
    }

    public function getYoutube() {
        return $this->youtube;
    }

    public function getSitio() {
        return $this->sitio;
    }

    public function getGoogleMaps() {
        return $this->google_maps;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrimerDiaSem() {
        return $this->primer_dia_sem;
    }

    public function getUltimoDiaSem() {
        return $this->ultimo_dia_sem;
    }

    public function getEntrada() {
        return $this->entrada;
    }

    public function getCierre() {
        return $this->cierre;
    }

    public function getEstatusAnuncio() {
        return $this->estatus_anuncio;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function getFechaPublicacion() {
        return $this->fecha_publicacion;
    }

    public function getDestacado() {
        return $this->destacado;
    }
    public function getIdSolicitud() {
        return $this->idSolicitud;
    }


    public function setIdAnuncio($idAnuncio) {
        $this->idAnuncio = $idAnuncio;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }


    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setUrlImagen($url_imagen) {
        $this->url_imagen = $url_imagen;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function setColonia($colonia) {
        $this->colonia = $colonia;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    public function setInstagram($instagram) {
        $this->instagram = $instagram;
    }

    public function setYoutube($youtube) {
        $this->youtube = $youtube;
    }


    public function setSitio($sitio) {
        $this->sitio = $sitio;
    }

    public function setGoogleMaps($google_maps) {
        $this->google_maps = $google_maps;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrimerDiaSem($primer_dia_sem) {
        $this->primer_dia_sem = $primer_dia_sem;
    }
    public function setUltimoDiaSem($ultimo_dia_sem) {
        $this->ultimo_dia_sem = $ultimo_dia_sem;
    }

    public function setEntrada($entrada) {
        $this->entrada = $entrada;
    }

    public function setCierre($cierre) {
        $this->cierre = $cierre;
    }

    public function setEstatusAnuncio($estatus_anuncio) {
        $this->estatus_anuncio = $estatus_anuncio;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    public function setFechaPublicacion($fecha_publicacion) {
        $this->fecha_publicacion = $fecha_publicacion;
    }

    public function setDestacado($destacado) {
        $this->destacado = $destacado;
    }


    public function setIdSolicitud($idSolicitud) {
        $this->idSolicitud = $idSolicitud;
    }

  
    

    public function guardar() {
        $conexion = new Conexion();
        if($this->idAnuncio)/*UPDATE*/{
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET idCategoria = :idCategoria, titulo = :titulo, url_imagen = :url_imagen, municipio=:municipio, estado = :estado, calle = :calle, colonia = :colonia, cp = :cp, telefono = :telefono, facebook = :facebook, instagram = :instagram, youtube = :youtube, sitio = :sitio, google_maps = :google_maps, descripcion = :descripcion, primer_dia_sem = :primer_dia_sem, ultimo_dia_sem = :ultimo_dia_sem, entrada = :entrada, cierre = :cierre, estatus_anuncio = :estatus_anuncio, keywords = :keywords, fecha_publicacion = :fecha_publicacion, destacado = :destacado WHERE idAnuncio = :idAnuncio');
            
            $consulta->bindParam(':idAnuncio', $this->idAnuncio);
            $consulta->bindParam(':idCategoria', $this->idCategoria);           
            $consulta->bindParam(':titulo', $this->titulo);
            $consulta->bindParam(':url_imagen', $this->url_imagen);
            $consulta->bindParam(':municipio', $this->municipio);        
            $consulta->bindParam(':estado', $this->estado);            
            $consulta->bindParam(':calle', $this->calle);        
            $consulta->bindParam(':colonia', $this->colonia);        
            $consulta->bindParam(':cp', $this->cp);      
            $consulta->bindParam(':telefono', $this->telefono); 
            $consulta->bindParam(':facebook', $this->facebook);
            $consulta->bindParam(':instagram', $this->instagram); 
            $consulta->bindParam(':youtube', $this->youtube);             
            $consulta->bindParam(':sitio', $this->sitio);    
            $consulta->bindParam(':google_maps', $this->google_maps);       
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':primer_dia_sem', $this->primer_dia_sem);
            $consulta->bindParam(':ultimo_dia_sem', $this->ultimo_dia_sem);  
            $consulta->bindParam(':entrada', $this->entrada);
            $consulta->bindParam(':cierre', $this->cierre);
            $consulta->bindParam(':estatus_anuncio', $this->estatus_anuncio);
            $consulta->bindParam(':keywords', $this->keywords);
            $consulta->bindParam(':fecha_publicacion', $this->fecha_publicacion);
            $consulta->bindParam(':destacado', $this->destacado);    
            $consulta->execute();
        }else /*Insert*/{
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (idCategoria, titulo, url_imagen, municipio, estado, calle, colonia, cp, telefono, facebook, instagram, youtube, sitio, google_maps, descripcion, primer_dia_sem, ultimo_dia_sem, entrada, cierre, estatus_anuncio, keywords, fecha_publicacion, destacado, idSolicitud) VALUES (:idCategoria, :titulo, :url_imagen, :municipio, :estado, :calle, :colonia, :cp, :telefono, :facebook, :instagram, :youtube, :sitio, :google_maps, :descripcion, :primer_dia_sem, :ultimo_dia_sem, :entrada, :cierre, :estatus_anuncio, :keywords, :fecha_publicacion, :destacado, :idSolicitud)');
            $consulta->bindParam(':idCategoria', $this->idCategoria);           
            $consulta->bindParam(':titulo', $this->titulo);
            $consulta->bindParam(':url_imagen', $this->url_imagen);            
            $consulta->bindParam(':municipio', $this->municipio);        
            $consulta->bindParam(':estado', $this->estado);            
            $consulta->bindParam(':calle', $this->calle);        
            $consulta->bindParam(':colonia', $this->colonia);        
            $consulta->bindParam(':cp', $this->cp);      
            $consulta->bindParam(':telefono', $this->telefono); 
            $consulta->bindParam(':facebook', $this->facebook);
            $consulta->bindParam(':instagram', $this->instagram); 
            $consulta->bindParam(':youtube', $this->youtube);             
            $consulta->bindParam(':sitio', $this->sitio);    
            $consulta->bindParam(':google_maps', $this->google_maps);       
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':primer_dia_sem', $this->primer_dia_sem);
            $consulta->bindParam(':ultimo_dia_sem', $this->ultimo_dia_sem);  
            $consulta->bindParam(':entrada', $this->entrada);
            $consulta->bindParam(':cierre', $this->cierre);
            $consulta->bindParam(':estatus_anuncio', $this->estatus_anuncio);
            $consulta->bindParam(':keywords', $this->keywords);
            $consulta->bindParam(':fecha_publicacion', $this->fecha_publicacion);
            $consulta->bindParam(':destacado', $this->destacado);    
            $consulta->bindParam(':idSolicitud', $this->idSolicitud);
            //var_dump($consulta);
            if($consulta->execute()){
                $this->id = $conexion->lastInsertId();
                
                return true;
            }else{       
                return false;
                
            }
        }
           
            $conexion = null;
    }


    
    public function eliminar(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idAnuncio = :idAnuncio');
        $consulta->bindParam(':idAnuncio', $this->idAnuncio);
      
        
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idAnuncio) {

        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idAnuncio = :idAnuncio');
        $consulta->bindParam(':idAnuncio', $idAnuncio);
        $consulta->execute();
        $registro = $consulta->fetch();
        //print_r($registro);
        $conexion = null;
        if ($registro) {
           
            return new self($registro['titulo'], $registro['url_imagen'], $registro['municipio'], $registro['estado'], $registro['calle'], $registro['colonia'], $registro['cp'], $registro['telefono'], $registro['facebook'], $registro['instagram'], $registro['youtube'], $registro['sitio'], $registro['google_maps'], $registro['descripcion'], $registro['primer_dia_sem'], $registro['ultimo_dia_sem'], $registro['entrada'], $registro['cierre'], $registro['estatus_anuncio'], $registro['keywords'], $registro['fecha_publicacion'], $registro['destacado'], $idAnuncio, $registro['idCategoria'],$registro['idSolicitud']);
            
        } else {
            return false;
            
        }
    }

 

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *,DATE_FORMAT(fecha_publicacion, "%d-%m-%Y") FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria WHERE idAnuncio LIMIT 50');
        $consulta->execute();
        $registros = $consulta->fetchAll();
  
        $conexion = null;
        return $registros;
    }

    public static function recuperarPorCorte($rango1, $rango2) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *,DATE_FORMAT(fecha_publicacion, "%d-%m-%Y") FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria WHERE idAnuncio BETWEEN :rango1 AND :rango2 LIMIT 200');
        $consulta->bindParam(':rango1', $rango1);
        $consulta->bindParam(':rango2', $rango2);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public static function recuperarPorID($id_search) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *,DATE_FORMAT(fecha_publicacion, "%d-%m-%Y") FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria WHERE idAnuncio = :id_search LIMIT 1');
        $consulta->bindParam(':id_search', $id_search);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }



    public static function recuperarTotal() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT idAnuncio FROM anuncios');
        $consulta->execute();
        $total = $consulta->rowCount();
        $conexion = null;
        return $total;
    }

    public static function busqueda($search) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT *,DATE_FORMAT(fecha_publicacion, '%d-%m-%Y') FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria WHERE ( keywords LIKE '%$search%')");
        //$consulta = $conexion->prepare("SELECT * from anuncios WHERE keywords LIKE '%$search%'");
        $consulta->execute();
        $registros = $consulta->fetchAll();
  
        $conexion = null;
        return $registros;
    }

    public static function getRandom(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria ORDER BY RAND() LIMIT 6');
        $consulta->execute();
        $registros = $consulta->fetchAll();
  
        $conexion = null;
        return $registros;
       
    }

    
    public function recuperarPorCategoria() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA 
         . ' WHERE idCategoria = :idCategoria');
        $consulta->bindParam(':idCategoria', $this->idCategoria); 
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }    


    public function eliminarPorIdSolicitud($idSolicitud){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idSolicitud = :idSolicitud');
        $consulta->bindParam(':idSolicitud', $idSolicitud);
        $consulta->execute();
        $conexion = null;
        
    }

    public static function buscarPorIdSolictud($idSolicitud){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria WHERE idSolicitud = :idSolicitud');
        $consulta->bindParam(':idSolicitud', $idSolicitud);
        $consulta->execute();
        $registros = $consulta->fetchAll();
  
        $conexion = null;
        return $registros;
       
    }

    public static function buscarPorIdSolictud2($idSolicitud){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria WHERE idSolicitud = :idSolicitud');
        $consulta->bindParam(':idSolicitud', $idSolicitud);
        $consulta->execute();
        $registros = $consulta->fetch();
  
        $conexion = null;
        return $registros;
       
    }

  

}
