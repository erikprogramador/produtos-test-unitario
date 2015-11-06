<?php

require __DIR__ . '/../app/bootstrap.php';

$app->mount('/', new Store\RouteController());

$app->run();