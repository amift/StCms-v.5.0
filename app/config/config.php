<?php

return new \Phalcon\Config([
    // DATABASE SETTINGS
    'database' => [
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'dbname'   => 'db_phalcon_stcms5',
    ],
    // APPLICATION SETTINGS
    'application' => [
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'formsDir'       => __DIR__ . '/../../app/forms/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/libraries/',
        'baseUri'        => '/',
    ],
    // REDIS SESSIONS
    'sessions' => [
        'pathhost' => 'tcp://127.0.0.1:6379?weight=1',
        'lifetime' => 999999999,
    ]
]);