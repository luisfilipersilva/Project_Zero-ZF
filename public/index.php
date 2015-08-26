<?php
header("Content-type: text/html; charset=utf-8");
 
// Sistema operacional do servidor
defined('OS')
    || define('OS', (stripos( $_SERVER["SERVER_SOFTWARE"], "win32" ) == TRUE ? "WINDOWS" : "UNIX"));
    
// Tipo de barra a utilizar de acordo com o sistema
defined('BAR')
    || define('BAR', (OS == "WINDOWS" ? "\\" : "/"));
    
// Separador de caminhos de acordo com o sistema
defined('PATH_SEPARATOR')
    || define('PATH_SEPARATOR', (OS == "WINDOWS" ? ";" : ":"));

// Caminho completo para a pasta da aplicação    
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . BAR . '..'));
 
// Nome da aplicação
defined('APPLICATION_NAME')
    || define('APPLICATION_NAME', ltrim(strrchr( APPLICATION_PATH , BAR), BAR));

// Ambiente da aplicação
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));
     
// Certifique-se que o caminho para a biblioteca do Zend é valido
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../../biblioteca/php/zend/zend-1.11.11/'),
    '.',
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/application/configs/application.ini'
);

$application->bootstrap()
            ->run(); 