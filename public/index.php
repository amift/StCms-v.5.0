<?php

error_reporting(E_ALL);
use Phalcon\Mvc\Application;

define('ADMINLTE_PATH', '/public/assets/alte/');
define('CSS_PATH',      '/public/assets/css/');
define('JS_PATH',       '/public/assets/js/');
define('ADMINCSS_PATH', '/public/assets/admin/css/');
define('ADMINJS_PATH',  '/public/assets/admin/js/');
define('UPLOAD_PATH',   '/public/uploads/');
define('IMG_PATH',      '/public');

try {
    $config = include __DIR__ . "/../app/config/config.php";
    include __DIR__ . "/../app/config/loader.php";
    include __DIR__ . "/../app/config/services.php";
    $application = new Application($di);
    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo $e->getMessage();
}