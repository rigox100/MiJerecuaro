<?php

require_once 'Conexion.php';

class Categoria {

    private $idCategoria;
    private $nombre;
    private $descripcion;
 

    const TABLA = 'categorias';

    public function __construct($nombre=null, $descripcion=null, $idCategoria=null ) {

        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
      
        $this->idCategoria = $idCategoria;

    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    


    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }



    public function guardar() {
        $conexion = new Conexion();
        if ($this->idCategoria) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, descripcion = :descripcion WHERE idCategoria = :idCategoria');
            $consulta->bindParam(':idCategoria', $this->idCategoria);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':descripcion', $this->descripcion);
            
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, descripcion) VALUES (:nombre, :descripcion)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':descripcion', $this->descripcion);
         
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
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idCategoria = :idCategoria');
        $consulta->bindParam(':idCategoria', $this->idCategoria);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idCategoria) {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  * FROM ' . self::TABLA . ' WHERE idCategoria = :idCategoria');
        $consulta->bindParam(':idCategoria', $idCategoria);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['nombre'], $registro['descripcion'], $idCategoria);

        } else {
            return false;

        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    public static function getRandom() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM categorias ORDER BY RAND() LIMIT 10');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }




}
