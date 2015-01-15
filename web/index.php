<?php
ini_set('display_errors', 0);

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/MyApp/app.php';
require __DIR__.'/../src/MyApp/Config/prod.php';
require __DIR__.'/../src/MyApp/router.php';
$app->run();