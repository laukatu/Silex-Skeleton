<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use MyApp\Controller;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'error/'.$code.'.html.twig',
        'error/'.substr($code, 0, 2).'x.html.twig',
        'error/'.substr($code, 0, 1).'xx.html.twig',
        'error/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});

$app->mount('/', new MyApp\Controller\MainControllerProvider());