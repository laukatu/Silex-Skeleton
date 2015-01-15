<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
$app->register(new RoutingServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new HttpFragmentServiceProvider());

$app->register(new TranslationServiceProvider(), array('locale_fallbacks' => array('en')));
$app['translator'] = $app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());
    $translator->addResource('yaml', __DIR__.'/Locale/es.yml', 'es');

    return $translator;
});

$app->register(new TwigServiceProvider());
$app['twig'] = $app->extend('twig', function($twig, $app) {             
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use (&$app) {
        return sprintf($app['request_stack']->getMasterRequest()->getBasepath().'/web/assets/%s', ltrim($asset, '/'));
    }));
    $twig->addFunction(new \Twig_SimpleFunction('upload', function ($uploaded) use (&$app) {
        return sprintf($app['request_stack']->getMasterRequest()->getBasepath().'/web/upload/%s', ltrim($uploaded, '/'));
    }));
    return $twig;
});

$app->register(new DoctrineServiceProvider());
$app['db'] = $app->extend('db', function($db, $app) {
    return $db;
});

return $app;