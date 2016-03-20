<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(array(
	'Stcms\Controllers'    => __DIR__ . '/../controllers/',
	'Stcms\Models'         => __DIR__ . '/../models/',
	'Stcms\Forms'          => __DIR__ . '/../forms/',
	'Stcms\Libraries'      => __DIR__ . '/../libraries/',
	'Stcms\Plugins'        => __DIR__ . '/../plugins/',
	'Stcms\Helpers'        => __DIR__ . '/../helpers/',
))->register();