<?php 
    require '../src/lib/TwitterAPIExchange.php';
    require '../models/Twitter.php';
    
    class TwitterController {

        private $tweets;

		public function __construct(){
			$this->tweets = new TwitterClass();
		}

        public function getTweets($user){
            $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
            //Get user parameter
            $getUser = '?screen_name='.$user.'&count=10';        
            $requestMethod = 'GET';
    
            $twitter = new TwitterAPIExchange($this->tweets->getSettings());
            $json = $twitter->setGetfield($getUser)
                            ->buildOauth($url, $requestMethod)
                            ->performRequest();
            return $json;
        }
    
        public function getTweetsArray($jsonraw){
            $rawdata = "";
    
            $json = json_decode($jsonraw, true);
            $jsonItems = count($json);
                
            if(isset( $json['errors'] )){
                return '{"message": {"text":"there is no data with that user"}';
            }
            else{
                $json = json_decode($jsonraw);
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
    }

?>