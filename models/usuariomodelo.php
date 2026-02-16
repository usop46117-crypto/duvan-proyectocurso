<?php

///IMPORTACION DE LA CONEXION A LA BASE DE DATOS///
include_once 'conexion.php';

class UsuarioModelo extends Conexion{
    ///METODO PARA INSERTAR USUARIOS (CREATE)///
    public function registrarUsuarioModelo($datos, $tabla){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare(("INSERT INTO usuarios (nombre, email, password) VALUES(:nombre, :email, :clave)"));
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(':clave', $datos['clave'], PDO::PARAM_STR);
        $resultado = $stmt->execute();
        ///CERRAR CONEXIONES
        $stmt = null;
        $pdo = null;
        if($resultado){
            return "success";
        }
        else{
            return "error";
        }
    }

    ///Metodo para ingresar a sesion///
    public function ingresarUsuarioModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare("SELECT nombre, password FROM usuarios where nombre = :nombre");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $resultado;
        
    }

    ///,ETODO PARA LISTAR USUARIOS///
    public function listarUsuariosModelo(){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('SELECT * FROM usuarios ORDER BY id desc');
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt = null;
        $pdo = null;
        return $resultado;
    }

    ///METODO PARA LISTAR UN USUARIO POR ID
    public function listarUsuarioIdModelo($id){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $resultado;
        

    }

    ///METODO PARA ACTUALIZAR USUARIO///
    public function actualizarUsuarioModelo($datos){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('UPDATE usuarios SET nombre = :nombre, email = :email, password = :clave WHERE id = :id');
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(':clave', $datos['clave'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $resultado = $stmt->execute();
        $stmt = null;
        $pdo = null;
        if($resultado){
            return 'success';
        }
        else{
            return 'error';
        }
    }
    ///METODO PARA ELIMINAR USUARIO
    public function eliminarUsuarioModelo($id){
        $pdo = $this->conectar();
        $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $respuesta = $stmt->execute();
        $stmt = null;
        $pdo = null;
        if($respuesta){
            return 'success';
        }
        else{
            return 'error';
        }
    }
}
?>