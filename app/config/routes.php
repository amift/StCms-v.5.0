<?php

$router = new Phalcon\Mvc\Router(false);

$router->add('/logout', array(
    'namespace'     => 'Stcms\Controllers', 
    'controller'    => 'login', 
    'action'        => 'out'));

$router->add('/login', array(
    'namespace'     => 'Stcms\Controllers', 
    'controller'    => 'login', 
    'action'        => 'index'));

$router->add('/:controller/:action', array(
    'namespace'     => 'Stcms\Controllers', 
    'controller'    => 'index', 
    'action'        => 'index'));

$router->add('/admin/:controller/:action/:params', array(
    'namespace'     => 'Stcms\Controllers\Admin', 
    'controller'    => 1, 
    'action'        => 2, 
    'params'        => 3,));

$router->add('/admin/:controller', array(
    'namespace'     => 'Stcms\Controllers\Admin', 
    'controller'    => 1, 
    'action'        => 'index'));

$router->add('/admin/', array(
    'namespace'     => 'Stcms\Controllers\Admin', 
    'controller'    => 'index', 
    'action'        => 'index'));

$router->add('/admin', array(
    'namespace'     => 'Stcms\Controllers\Admin', 
    'controller'    => 'index', 
    'action'        => 'index'));

return $router;
