<?php

require_once 'Conexion.php';

class Solicitud {

    private $idSolicitud;
    private $nombre_negocio;
    private $url_imagen;
    private $rfc;
    private $tel;
    private $calle;
    private $colonia;
    private $cp;
    private $municipio;
    private $estatus_solicitud;
    private $fecha_solicitud;
    private $descripcion;
    private $observaciones;

    const TABLA = 'solicitudes';

    public function __construct($nombre_negocio=null, $url_imagen=null, $rfc=null, $tel=null, $calle=null, $colonia=null, $cp=null, $municipio=null, $estatus_solicitud=null, $fecha_solicitud=null, $descripcion=null, $observaciones=null, $idSolicitud=null ) {

        
        $this->nombre_negocio = $nombre_negocio;
        $this->url_imagen = $url_imagen;
        $this->rfc = $rfc;
        $this->tel = $tel; 
        $this->calle = $calle; 
        $this->colonia = $colonia; 
        $this->cp = $cp; 
        $this->municipio = $municipio; 
        $this->estatus_solicitud = $estatus_solicitud;
        $this->fecha_solicitud = $fecha_solicitud;
        $this->descripcion = $descripcion;
        $this->observaciones = $observaciones;
        $this->idSolicitud = $idSolicitud;

    }

    public function getIdSolicitud() {
        return $this->idSolicitud;
    }

    public function getNombreNegocio() {
        return $this->nombre_negocio;
    }

    public function getUrlImagen() {
        return $this->url_imagen;
    }

    public function getRFC() {
        return $this->rfc;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getColonia() {
        return $this->colonia;
    }
    
    public function getCP() {
        return $this->cp;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getEstatusSolicitud() {
        return $this->estatus_solicitud;
    }

     public function getFechaSolicitud() {
        return $this->fecha_solicitud;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }



    public function setIdSolicitud($idSolicitud) {
        $this->idSolicitud = $idSolicitud;
    }


    public function setNombreNegocio($nombre_negocio) {
        $this->nombre_negocio = $nombre_negocio;
    }

    public function setUrlImagen($url_imagen) {
        $this->url_imagen = $url_imagen;
    }


    public function setRFC($rfc) {
        $this->rfc = $rfc;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function setColonia($colonia) {
        $this->colonia = $colonia;
    }

    public function setCP($cp) {
        $this->cp = $cp;
    }


    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }


    public function setEstatusSolicitud($estatus_solicitud) {
        $this->estatus_solicitud = $estatus_solicitud;
    }

    public function setFechaSolicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    public function guardar() {
        $conexion = new Conexion();
        if ($this->idSolicitud) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre_negocio=:nombre_negocio, url_imagen=:url_imagen, rfc=:rfc, tel=:tel, calle=:calle, colonia=:colonia, cp=:cp, municipio=:municipio, fecha_solicitud=:fecha_solicitud, estatus_solicitud=:estatus_solicitud, descripcion=:descripcion, observaciones = :observaciones WHERE idSolicitud = :idSolicitud');
            $consulta->bindParam(':idSolicitud', $this->idSolicitud);
            $consulta->bindParam(':nombre_negocio', $this->nombre_negocio);
            $consulta->bindParam(':url_imagen', $this->url_imagen);
            $consulta->bindParam(':rfc', $this->rfc);
            $consulta->bindParam(':tel', $this->tel);
            $consulta->bindParam(':calle', $this->calle);
            $consulta->bindParam(':colonia', $this->colonia);
            $consulta->bindParam(':cp', $this->cp);
            $consulta->bindParam(':municipio', $this->municipio);
            $consulta->bindParam(':fecha_solicitud', $this->fecha_solicitud);
            $consulta->bindParam(':estatus_solicitud', $this->estatus_solicitud);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':observaciones', $this->observaciones);
            $consulta->execute();
            //var_dump($consulta);
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre_negocio, url_imagen, rfc, tel, calle, colonia, cp, municipio, estatus_solicitud, fecha_solicitud, descripcion) VALUES (:nombre_negocio, :url_imagen, :rfc, :tel, :calle, :colonia, :cp, :municipio, :estatus_solicitud, :fecha_solicitud, :descripcion)');
            $consulta->bindParam(':nombre_negocio', $this->nombre_negocio);
            $consulta->bindParam(':url_imagen', $this->url_imagen);
            $consulta->bindParam(':rfc', $this->rfc);
            $consulta->bindParam(':tel', $this->tel);
            $consulta->bindParam(':calle', $this->calle);
            $consulta->bindParam(':colonia', $this->colonia);
            $consulta->bindParam(':cp', $this->cp);
            $consulta->bindParam(':municipio', $this->municipio);
            $consulta->bindParam(':estatus_solicitud', $this->estatus_solicitud);
            $consulta->bindParam(':fecha_solicitud', $this->fecha_solicitud);
            $consulta->bindParam(':descripcion', $this->descripcion);
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
        //echo $this->id;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idSolicitud = :idSolicitud');
        $consulta->bindParam(':idSolicitud', $this->idSolicitud);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idSolicitud) {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  nombre_negocio, url_imagen, rfc, tel, calle, colonia, cp, municipio, estatus_solicitud, fecha_solicitud, descripcion, observaciones FROM ' . self::TABLA . ' WHERE idSolicitud = :idSolicitud');
        $consulta->bindParam(':idSolicitud', $idSolicitud);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['nombre_negocio'], $registro['url_imagen'], $registro['rfc'], $registro['tel'], $registro['calle'], $registro['colonia'], $registro['cp'], $registro['municipio'], $registro['estatus_solicitud'], $registro['fecha_solicitud'], $registro['descripcion'], $registro['observaciones'], $idSolicitud);

        } else {
            return false;

        }
    }

    /* public static function buscarPorIdUsuario($idUsuario) {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *, DATE_FORMAT(fecha_solicitud, "%d-%m-%Y") FROM ' . self::TABLA . ' WHERE idUsuario = :idUsuario');
        $consulta->bindParam(':idUsuario', $idUsuario);
        $consulta->execute();
        $registro = $consulta->fetchAll();
        //var_dump($registro);
        $conexion = null;
        return $registro;

    } */



    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *, DATE_FORMAT(fecha_solicitud, "%d-%m-%Y") FROM solicitudes');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    
    public static function buscarPorIdSolicitud($idSolicitud) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *, DATE_FORMAT(fecha_solicitud, "%d %m %Y") FROM ' . self::TABLA . ' WHERE idSolicitud = :idSolicitud');
        $consulta->bindParam(':idSolicitud', $idSolicitud);
        $consulta->execute();
        $registro = $consulta->fetchAll();
        //var_dump($registro);
        $conexion = null;
        return $registro;
    }


    public static function buscarRecientes() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT idSolicitud, nombre_negocio, DATE_FORMAT(fecha_solicitud, "%d %m %Y") FROM '.self::TABLA.' WHERE estatus_solicitud = "En proceso" ORDER BY fecha_solicitud DESC LIMIT 0,5');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    public static function obtenerTotalSolicitudes() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT COUNT(estatus_solicitud) FROM solicitudes WHERE estatus_solicitud = "En proceso"');
        $consulta->execute();
        $registros = $consulta->fetch();
        $conexion = null;
        return $registros;
    }

    public function actualizarEstadoSolicitud(){
        $conexion = new Conexion();
        if ($this->idSolicitud) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET estatus_solicitud=:estatus_solicitud,  observaciones = :observaciones WHERE idSolicitud = :idSolicitud');
            $consulta->bindParam(':idSolicitud', $this->idSolicitud);
            $consulta->bindParam(':estatus_solicitud', $this->estatus_solicitud);
            $consulta->bindParam(':observaciones', $this->observaciones);
            $consulta->execute();
    }
    $conexion = null;
    }


    public function actualizarSolicitud(){
            $conexion = new Conexion();
            if ($this->idSolicitud) /* Modifica */ {
                $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre_negocio=:nombre_negocio, url_imagen=:url_imagen, tel=:tel, calle=:calle, colonia=:colonia, cp=:cp, municipio=:municipio, estatus_solicitud=:estatus_solicitud, descripcion=:descripcion, observaciones = :observaciones WHERE idSolicitud = :idSolicitud');
                $consulta->bindParam(':idSolicitud', $this->idSolicitud);
                $consulta->bindParam(':nombre_negocio', $this->nombre_negocio);
                $consulta->bindParam(':url_imagen', $this->url_imagen);
                $consulta->bindParam(':tel', $this->tel);
                $consulta->bindParam(':calle', $this->calle);
                $consulta->bindParam(':colonia', $this->colonia);
                $consulta->bindParam(':cp', $this->cp);
                $consulta->bindParam(':municipio', $this->municipio);
                $consulta->bindParam(':estatus_solicitud', $this->estatus_solicitud);
                $consulta->bindParam(':descripcion', $this->descripcion);
                $consulta->bindParam(':observaciones', $this->observaciones);
                $consulta->execute();
    }
}

}
