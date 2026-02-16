<?php

class EnlacesPaginasModelo
{
    //METODO PARA GESTIONAR LOS ENLACES
    public function enlacesPaginas($enlace)
    {
        ///VALIDACION DE ENLACES EN LISTA BLANCA
        if ($enlace == "inicio" || 
            $enlace == "registrar" || 
            $enlace == "usuarios" || 
            $enlace == "ingresar" ||
            $enlace == "editar" || 
            $enlace == "salir") {
            $modulo = 'views/modules/' . $enlace . '.php';
        }
        elseif($enlace == 'ok-usu'){
            $modulo = 'views/modules/registrar.php';
        }
        else{
            $modulo = 'views/modules/errorpagina.php';
        }
        return $modulo;
    }
}
