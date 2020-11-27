<?php

require_once 'Conexion.php';

class Rol {

    private $idRol;
    private $rol;
    private $descripcion;

    

    const TABLA = 'roles';
    
    public function __construct($rol=null, $descripcion=null, $idRol=null) {
        
        $this->rol = $rol;
        $this->descripcion = $descripcion;
        $this->idRol = $idRol;
      
       
    }

    public function getIdRol() {
        return $this->idRol;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }



    public function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setdescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    

    public function guardar() {
        $conexion = new Conexion();
        if ($this->idUsuario) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET rol = :rol, descripcion = :descripcion WHERE idRol = :idRol');
            $consulta->bindParam(':idRol', $this->idRol);
            $consulta->bindParam(':rol', $this->rol);
            $consulta->bindParam(':descripcion', $this->descripcion);  
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (rol, descripcion) VALUES (:rol, :descripcion)');
            $consulta->bindParam(':rol', $this->rol);
            $consulta->bindParam(':descripcion', $this->descripcion); 
            $consulta->execute();
            $this->idRol = $conexion->lastInsertId();
          
            
        }
        $conexion = null;
    }
    
    public function eliminar(){
        //echo $this->id;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idRol = :idRol');
        $consulta->bindParam(':idRol', $this->idRol);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idRol) {
   
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  rol, descripcion FROM ' . self::TABLA . ' WHERE idRol = :idRol');
        $consulta->bindParam(':idRol', $idRol);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['rol'], $registro['descripcion'], $idRol);
            
        } else {
            return false;
            
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM '.self::TABLA);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


}
