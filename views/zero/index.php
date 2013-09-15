<?php
require_once '../../lib/Twig/Autoloader.php';

$v = array();
if(isset($_SERVER['PATH_INFO'])){
    if( $_SERVER['PATH_INFO'] == '/' ){
        $v[1] = 'home.html';
    }else{
        $v = explode('/', $_SERVER['PATH_INFO']);
        if($v[1] == '') $v[1] = 'home.html';
    }
}else {
    $v = array();
    $v[1] = 'home.html';
}

// Agregando clases para plantillas Django
Twig_Autoloader::register();
$loader     = new Twig_Loader_Filesystem('template');
$twig       = new Twig_Environment($loader, array('debug' => true));

// Variable para envios a plantilla Twig
$locals = array();
$locals['SITE']         = $_SERVER['SERVER_NAME'].'/';
$locals['SITE_URL']     = $_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'/';
$locals['STATIC_URL']   = $locals['SITE'].'static/';

if ( file_exists('template/app/'.$v[1]) ) {
    echo $twig->render('app/'.$v[1], $locals );
    // FIN DE PAGINA INICIAL
}
?>