<?php

//CONTROLADORES
require_once 'controllers/controlador.php';
require_once 'controllers/usuariocontroller.php';
//MODELOS
require_once 'models/enlacespaginasmodelo.php';
require_once 'models/usuariomodelo.php';

$controlador = new Controlador();
$controlador->cargarTemplate();
