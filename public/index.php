<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/wp-load.php';


call_user_func(function() {
    $kernel = \App\Integration\Container::setupKernel();
    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
});

