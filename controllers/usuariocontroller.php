<?php

class UsuarioController
{
    #METODO PARA REGISTRAR USUARIOS
    public function registrarUsuarioControlador()
    {
        if (
            isset($_POST['nombre']) ||
            isset($_POST['email']) ||
            isset($_POST['clave'])
        ) {
            if (
                !empty($_POST['nombre']) &&
                !empty($_POST['email']) &&
                !empty($_POST['clave'])
            ) {
                $datos = array(
                    'nombre' => $_POST['nombre'],
                    'email' => $_POST['email'],
                    'clave' => $_POST['clave']
                );

                #instanciar clase
                $respuesta = new UsuarioModelo();
                if ($respuesta->registrarUsuarioModelo($datos, 'usuarios') == 'success') {
                    header('location:index.php?action=usuarios&dato=ok');
                    exit();
                } else {
                    header('location:index.php?action=usuarios&dato=err-ins');
                    exit();
                }
            }
            else{
                header('location:index.php?action=registrar&&dato=fal');
                exit();
            }
        }
    }
    #METODO PARA INGRESAR USUARIOS / INICIAR SESION
    public function ingresarUsuarioControlador()
    {
        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            $datos = array(
                'nombre' => $_POST['nombre'],
                'clave' => $_POST['clave']
            );
            #INSTANCIAR MODELO USUARIO  
            $usuarioModelo = new UsuarioModelo();
            $respuesta = $usuarioModelo->ingresarUsuarioModelo($datos);
            /////var_dump($respuesta);           
            if (!empty($respuesta)) {
                if ($respuesta['nombre'] == $_POST['nombre'] && $respuesta['password'] == $_POST['clave']) {
                    session_start();
                    $_SESSION['usuarioValido'] = true;
                    $_SESSION['nombreUsuario'] = $_POST['nombre'];
                    header('location:index.php?action=usuarios');
                } else {
                    $resultado = 'err_usu';
                }
            } else {
                $resultado = 'exit_err';
            }
            if (isset($resultado)) {
                header('location:index.php?action=ingresar&dato=' . $resultado);
            }
        }
    }

    ///METODO PARA LISTAR USUARIOS///
    public function listarUsuariosControlador()
    {
        $usuarioModelo = new UsuarioModelo();
        $resultado = $usuarioModelo->listarUsuariosModelo();
        return $resultado;
    }

    ///METODO PARA LISTAR UN SOLO USUARIO POR ID///
    public function listarUsuarioIdControlador()
    {
        if (isset($_GET['id'])) {
            $usuarioModelo = new UsuarioModelo();
            $usuario = $usuarioModelo->listarUsuarioIdModelo($_GET['id']);
            return $usuario;
        }
    }
    ///METODO PARA ACTUALIZAR AL USUARIO///
    public function actualizarUsuarioControlador()
    {
        if (isset($_POST['editarnombre']) && isset($_POST['editaremail']) && isset($_POST['editarclave'])) {
            $datos = array(
                'nombre' => $_POST['editarnombre'],
                'email' => $_POST['editaremail'],
                'clave' => $_POST['editarclave'],
                'id' => $_POST['id']
            );
            $usuarioModelo = new UsuarioModelo();
            $respuesta = $usuarioModelo->actualizarUsuarioModelo($datos);
            if ($respuesta == 'success') {
                header('location:index.php?action=usuarios&up=ok');
                exit();
            } else {
                header('location:index.php?action=usuarios&up=err');
                exit();
            }
        }
    }
    ///METODO PARA ELIMINAR UN USUARIO///
    public function eliminarUsuarioControlador()
    {
        if (isset($_GET['id']) && isset($_GET['op'])) {
            $usuarioModelo = new UsuarioModelo();
            $respuesta = $usuarioModelo->eliminarUsuarioModelo($_GET['id']);
            header('location:index.php?action=usuarios&resp=' . $respuesta);
            exit();
        }
    }
}
