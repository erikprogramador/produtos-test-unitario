<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider, array(
	'twig.path' => __DIR__ . '/../resources/views',
));
