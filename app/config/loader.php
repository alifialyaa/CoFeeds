<?php

use Phalcon\Loader;

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    [
        // $config->application->controllersDir,
        // $config->application->modelsDir,
        'CoFeeds\Events' => APP_PATH . '/events/',
    ]
)->register();
