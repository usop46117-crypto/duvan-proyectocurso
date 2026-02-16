<?php

class Controlador
{

    public function cargarTemplate()
    {
        include 'views/template.php';
    }

    ///METODOS PARA GUSTAR LOS ENLACES
    public function enlacesPaginasControlador(){
        if(isset($_GET['action'])){
            $enlace = $_GET['action'];
        }else{
            $enlace = 'inicio';
        }
        ///echo "El enlace es: " . $enlace;
        $respuesta = new EnlacesPaginasModelo();
        $respuesta->enlacesPaginas($enlace);

        include($respuesta->enlacesPaginas($enlace));
    }
}
