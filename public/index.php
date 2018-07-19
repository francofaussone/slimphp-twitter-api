<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../api-twitter/Twitter.php';

$app = new \Slim\App;

//  Routes
require '../src/routes/Tweets.php';

$app->run();