<?php

require_once 'Conexion.php';

class Usuario
{

    private $idUsuario;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $estatus;
    private $token;
    private $idRol;

    const TABLA = 'usuarios';

    public function __construct($nombre = null, $apellido = null, $email = null, $password = null, $estatus = null, $token = null, $idRol = null, $idUsuario = null)
    {

        $this->nombre = $nombre;
        $this->email = $email;
        $this->apellido = $apellido;
        $this->password = $password;
        $this->estatus = $estatus;
        $this->token = $token;
        $this->idRol = $idRol;
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEstatus()
    {
        return $this->estatus;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }


    public function setIdUsuario($idUsuario)
    {
        $this->id = $idUsuario;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }


    public function guardar()
    {
        $conexion = new Conexion();
        if ($this->idUsuario) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, apellido = :apellido, email = :email, password=:password, estatus = :estatus, idRol = :idRol WHERE idUsuario = :idUsuario');
            $consulta->bindParam(':idUsuario', $this->idUsuario);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellido', $this->apellido);
            $consulta->bindParam(':email', $this->email);
            $consulta->bindParam(':password', $this->password);
            $consulta->bindParam(':estatus', $this->estatus);
            $consulta->bindParam(':idRol', $this->idRol);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, apellido, email, password, estatus, token, idRol) VALUES (:nombre, :apellido, :email, :password, :estatus, :token, :idRol)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellido', $this->apellido);
            $consulta->bindParam(':email', $this->email);
            $consulta->bindParam(':password', $this->password);
            $consulta->bindParam(':estatus', $this->estatus);
            $consulta->bindParam(':token', $this->token);
            $consulta->bindParam(':idRol', $this->idRol);
            if ($consulta->execute()) {
                $this->id = $conexion->lastInsertId();
                return true;
            } else {
                return false;
            }
        }
        $conexion = null;
    }

    public function eliminar()
    {
        //echo $this->id;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idUsuario = :idUsuario');
        $consulta->bindParam(':idUsuario', $this->idUsuario);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idUsuario)
    {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  nombre, apellido, email, password, estatus, token, idRol FROM ' . self::TABLA . ' WHERE idUsuario = :idUsuario');
        $consulta->bindParam(':idUsuario', $idUsuario);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['nombre'], $registro['apellido'], $registro['email'], $registro['password'], $registro['estatus'], $registro['token'], $registro['idRol'], $idUsuario);
        } else {
            return false;
        }
    }

    public static function recuperarTodos()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM usuarios INNER JOIN roles ON roles.idRol = usuarios.idRol WHERE usuarios.idRol = 3');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public function logIn()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE email = :email and password = :password');
        $consulta->bindParam(':email', $this->email);
        $consulta->bindParam(':password', $this->password);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {

            $_SESSION['idUsuario'] = $registro[0];
            $_SESSION['nombre'] = $registro[1];
            $_SESSION['email'] = $registro[3];
            $_SESSION['idRol'] = $registro[7];
            return true;
        } else {
            return false;
        }
    }


    public function verificar_token()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE token = :token AND estatus = "Inactivo"');
        $consulta->bindParam(':token', $this->token);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            $_SESSION['idUsuario'] = $registro[0];
            $_SESSION['nombre'] = $registro[1];
            $_SESSION['email'] = $registro[3];
            $_SESSION['idRol'] = $registro[7];
            return true;
        } else {
            return false;
        }
    }


    public function verificar_token_activo()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE token = :token AND estatus = "Activo"');
        $consulta->bindParam(':token', $this->token);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar_estatus()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET estatus="Activo" WHERE token = :token');
        $consulta->bindParam(':token', $this->token);
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function verificar_email_registrado()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT email FROM ' . self::TABLA . ' WHERE email = :email AND estatus = "Activo"');
        $consulta->bindParam(':email', $this->email);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return true;
        } else {
            return false;
        }
    }


    public function reestablecer_password()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET password=:password WHERE email=:email AND token=:token');
        $consulta->bindParam(':email', $this->email);
        $consulta->bindParam(':password', $this->password);
        $consulta->bindParam(':token', $this->token);
        $consulta->execute();
        $registro = $consulta->rowCount();
        $conexion = null;
        echo $registro;
        if ($registro > 0) {
            return true;
        } else {
            return false;
        }
    }
}
