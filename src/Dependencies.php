<?php

namespace App;

use Mustache_Loader_FilesystemLoader;

$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER
]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->alias('App\Template\Renderer', 'App\Template\TwigRenderer');
$injector->define('Twig\Loader\FilesystemLoader', [
    ':paths' => dirname(__DIR__) . '/templates'
]);

$injector->alias('Twig\Loader\LoaderInterface', 'Twig\Loader\FilesystemLoader');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html'
        ])
    ]
]);

$injector->alias('App\Template\FrontendRenderer', 'App\Template\FrontendTwigRenderer');

$injector->alias('App\Menu\MenuReader', 'App\Menu\ArrayMenuReader');
$injector->share('App\Menu\ArrayMenuReader');

$injector->define('App\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages'
]);
$injector->alias('App\Page\PageReader', 'App\Page\FilePageReader');
$injector->share('App\Page\FilePageReader');

return $injector;