<?php 
require_once('../src/lib/TwitterAPIExchange.php');

class Twitter { 

    private $settings = array(
        'oauth_access_token' => "1019562300074856448-sMbWqyD68UnRAm0hesc8FHQZnuwHUN",
        'oauth_access_token_secret' => "EZwUW6mYpeMtpuJZ7veV8qN7HE6KDd8GVMYoTKfzNC1T0",
        'consumer_key' => "RLDO0DRcG4qqNHhk9Dqa7ABmY",
        'consumer_secret' => "own3KOPgX4eqRbjJfpWu6Okh9S0iC8ncAmi5ZhDWuuVCuqvXqL"
    );

    public function getTweets($user){
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        //Get user parameter
        $getUser = '?screen_name='.$user.'&count=10';        
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($this->settings);
        $json = $twitter->setGetfield($getUser)
                        ->buildOauth($url, $requestMethod)
                        ->performRequest();
        return $json;
    }

    public function getTweetsArray($jsonraw){
        $rawdata = "";

        $json = json_decode($jsonraw);
        $jsonItems = count($json);
        
        for($i=0; $i<$jsonItems; $i++){
            $user = $json[$i];
            $dateTweet = $user->created_at;
            $tweet = $user->text;
            
            $in_reply =  array (
                'id' => $user->in_reply_to_user_id,
                'name' => $user->in_reply_to_screen_name
            );

            $rawdata[$i]["created_at"]=$dateTweet;
            $rawdata[$i]["text"]=$tweet;
            if (!is_null($in_reply['id'])){
                $rawdata[$i]["in_reply"] = $in_reply;
            }   
        }
        return $rawdata;
    }
}    