<?php

namespace Store\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class StoreController
{

	public function indexAction(Application $app)
	{
		return $app['twig']->render('store/home.twig');
	}
}