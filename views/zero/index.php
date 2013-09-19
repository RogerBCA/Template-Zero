<?php
require_once '../../lib/Twig/Autoloader.php';

if(isset($_SERVER['PATH_INFO'])){
   $v = $_SERVER['PATH_INFO'];
}else {
   $v = '/home.html';
}
// Agregando clases para plantillas Django
Twig_Autoloader::register();
$loader     = new Twig_Loader_Filesystem('template');
$twig       = new Twig_Environment($loader, array('debug' => true));

// Variable para envios a plantilla Twig
$locals = array();
$locals['SITE']         = 'http://'.$_SERVER['SERVER_NAME'].'/';
$locals['SITE_URL']     = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'/';
$locals['STATIC_URL']   = 'http://'.$_SERVER['SERVER_NAME'].str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).'static/';

if ( file_exists('template/app'.$v) ) {
    echo $twig->render('app'.$v, $locals );
    // FIN DE PAGINA INICIAL
}
?>