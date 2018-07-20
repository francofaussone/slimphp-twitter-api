<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Get all Tweets
$app->get('/api/tweets/{nom}', function(Request $request, Response $response){
    
    $nom = $request->getAttribute('nom');

    try{
        $apitwitter = new TwitterController();

        $json =  $apitwitter->getTweets($nom);
        $rawdata =  $apitwitter->getTweetsArray($json);
        echo json_encode($rawdata);

    }catch(Exception $e){
        echo '{"message": {"text":'.$e->getMessage().'}';
    }

});


?>