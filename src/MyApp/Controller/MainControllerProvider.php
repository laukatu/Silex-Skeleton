<?php
namespace MyApp\Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MainControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

		$app->get('/', function () use ($app) {
		    return $app['twig']->render('index.html.twig', array());
		})
		->bind('homepage');									

		$app->get('/lang/{lang}', function($lang) use($app) {
			if ($lang == 'en' || file_exists(__DIR__.'/../Locale/'.$lang.'.yml')) {	
				$app['session']->set('locale', $lang);		
			}

			if (isset($_SERVER['HTTP_REFERER'])) {
				return $app->redirect($_SERVER['HTTP_REFERER']);
			} else {
				return $app->redirect($app['url_generator']->generate('homepage'));
			}
		})->bind('lang');

		return $controllers;
    }
}
