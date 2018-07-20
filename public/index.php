<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../controllers/TwitterController.php';

$app = new \Slim\App;

//  Routes
require '../src/routes/index.php';

$app->run();