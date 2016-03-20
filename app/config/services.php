<?php

use Phalcon\DI\FactoryDefault,
    Phalcon\Mvc\View,
    Phalcon\Events\Manager,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Session\Adapter\Redis,
    Phalcon\Mvc\Url as UrlResolver,
    Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
    Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;

$di = new FactoryDefault();

$di->set('router', function() {
    return require __DIR__ . '/routes.php';
}, true);

$di->set('url', function() use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
}, true);

$di->set('view', function() use ($config) {
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    $view->registerEngines([
        '.php' => function($view, $di) use ($config) {
            $volt = new VoltEngine($view, $di);
            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_',
                'compiledExtension' => '.compl',
                'compiledSeparator' => '#',
                'prefix'            => 'cache_',
                'compileAlways'     => TRUE, // TRUE - FOR ONLY DEVELOPMENT STATUS
                'stat'              => TRUE, // TRUE - FOR ONLY DEVELOPMENT STATUS
            ]);
            $compiler = $volt->getCompiler();
            //************* Add functions *************************
            $compiler->addFunction('statusCheck',function($resolvedArgs,$exprArgs)use($compiler){ return '('.$compiler->expression($exprArgs[0]['expr']).')? \'<span class="badge bg-green">вкл.</span>\' : \'<span class="badge bg-red">выкл.</span>\'' ; });
            $compiler->addFunction('getThumbBySyze', function($resolvedArgs, $exprArgs)use($compiler) {$delimiter = 'x';$argWidth  = (isset($exprArgs[1]['expr']['value']))? $exprArgs[1]['expr']['value'] : '' ;$argHeight = (isset($exprArgs[2]['expr']['value']))? $exprArgs[2]['expr']['value'] : '';if(($argWidth == '') && ($argHeight == '')){ $delimiter = ''; }$argImg    = $compiler->expression($exprArgs[0]['expr']);return 'IMG_PATH.str_replace(\'.\',\'_thumb'.$argWidth.$delimiter.$argHeight.'.\','.$argImg.');';});
            $compiler->addFunction('getThumb', function($resolvedArgs, $exprArgs)use($compiler){$argImg = $compiler->expression($exprArgs[0]['expr']);return 'IMG_PATH.str_replace(\'.\',\'_thumb.\',' . $argImg . ');';});
            //************* End Add functions *********************
            return $volt;
        },'.volt' => 'Phalcon\Mvc\View\Engine\Php'
    ]);
    return $view;
}, true);

$di->set('db', function() use ($config) {
    return new DbAdapter(array(
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname
    ));
});

$di->set('modelsMetadata', function() use ($config) {
    return new MetaDataAdapter();
});

$di->set('session', function() use ($config) {
    $session = new Redis([
        'path'     => $config->sessions->pathhost,
        'lifetime' => $config->sessions->lifetime,
        'statsKey' => 'sessions',
    ]);
    $session->start();
    return $session;
});

$di->set('dispatcher', function() {
    $eventsManager = new Manager();
    $eventsManager->attach("dispatch", function($event, $dispatcher, $exception) {
        if ($event->getType() == 'beforeException') {
            switch ($exception->getCode()) {
                case $dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                case $dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                case $dispatcher::EXCEPTION_NO_DI:
                case $dispatcher::EXCEPTION_CYCLIC_ROUTING:
                case $dispatcher::EXCEPTION_INVALID_HANDLER:
                case $dispatcher::EXCEPTION_INVALID_PARAMS:
                    $dispatcher->forward([
                        'namespace'  => 'Stcms\Controllers',
                        'controller' => 'errors',
                        'action'     => 'show404'
                    ]);
                    return false;
            }
        }
    });
    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($eventsManager);
    $dispatcher->setDefaultNamespace('Stcms\Controllers');
    return $dispatcher;
});        