<?php
// carga de archivo de configuración 
require_once 'config/config.php'; 
// carga automática de nuestros archivos de la carpeta libraries-> bibliotecas base 
spl_autoload_register( function($className){ 
    require_once 'libraries/'. $className .'.php'; 
});

