<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Get all Tweets
$app->get('/api/tweets', function(Request $request, Response $response){
    
    try{
        $apitwitter = new Twitter();

        $json =  $apitwitter->getTweets("aguchaves");
        $rawdata =  $apitwitter->getTweetsArray($json);
        echo json_encode($rawdata);

    }catch(Exception $e){
        echo '{"message": {"text":'.$e->getMessage().'}';
    }

});


?>